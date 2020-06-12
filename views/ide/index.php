<!DOCTYPE HTML>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">

    <meta name="description" content="Free and open-source online code editor that allows you to write and execute code from a rich set of languages.">
    <meta name="keywords" content="online editor, online code editor, online ide, online compiler, online interpreter, run code online, learn programming online,
            online debugger, programming in browser, online code runner, online code execution, debug online, debug C code online, debug C++ code online,
            programming online, snippet, snippets, code snippet, code snippets, pastebin, execute code, programming in browser, run c online, run C++ online,
            run java online, run python online, run ruby online, run c# online, run rust online, run pascal online, run basic online">
    <meta name="author" content="Herman Zvonimir Došilović">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:title" content="Oxy IDE - Free and open-source online code editor">
    <meta property="og:description" content="Free and open-source online code editor that allows you to write and execute code from a rich set of languages.">
    <meta property="og:image" content="https://raw.githubusercontent.com/judge0/ide/master/.github/wallpaper.png">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/goldenlayout.min.js" integrity="sha256-NhJAZDfGgv4PiB+GVlSrPdh3uc75XXYSM4su8hgTchI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/css/goldenlayout-base.css" integrity="sha256-oIDR18yKFZtfjCJfDsJYpTBv1S9QmxYopeqw2dO96xM=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/css/goldenlayout-dark-theme.css" integrity="sha256-ygw8PvSDJJUGLf6Q9KIQsYR3mOmiQNlDaxMLDOx9xL0=" crossorigin="anonymous" />

    <script>
        var require = {
            paths: {
                "vs": "https://unpkg.com/monaco-editor/min/vs",
                "monaco-vim": "https://unpkg.com/monaco-vim/dist/monaco-vim",
                "monaco-emacs": "https://unpkg.com/monaco-emacs/dist/monaco-emacs"
            }
        };
    </script>
    <script src="https://unpkg.com/monaco-editor/min/vs/loader.js"></script>
    <script src="https://unpkg.com/monaco-editor@0.18.1/min/vs/editor/editor.main.nls.js"></script>
    <script src="https://unpkg.com/monaco-editor@0.18.1/min/vs/editor/editor.main.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI=" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">

    <script type="text/javascript" src="third_party/download.js"></script>

    <script type="text/javascript" src="js/ide.js"></script>

    <link type="text/css" rel="stylesheet" href="css/ide.css">

    <title>Oxy IDE - Free and open-source online code editor</title>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-83802640-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-83802640-2');
    </script>

    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="ee4621ff-c682-44ac-8cfa-1835beddb98a";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</head>

<body>
    <div id="site-navigation" class="ui small inverted menu">
        <div id="site-header" class="header item">
            <a href="/">
                <img id="site-icon" src="./images/judge0_icon.png">
                <h2>Oxy IDE</h2>
            </a>
        </div>
        <div class="left menu">
            <div class="ui dropdown item site-links on-hover">
                File <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" target="_blank" href="/"><i class="file code icon"></i> New File</a>
                    <div class="item" onclick="save()"><i class="save icon"></i> Save (Ctrl + S)</div>
                    <div class="item" onclick="downloadSource()"><i class="download icon"></i> Download</div>
                    <div class="item"><i class="share icon"></i> Share</div>
                    <div id="insert-template-btn" class="item"><i class="file code outline icon"></i> Insert template
                        for current language</div>
                </div>
            </div>
            <div class="link item" onclick="$('#site-settings').modal('show')"><i class="cog icon"></i> Settings</div>
            <div class="item borderless">
                <select id="select-language" class="ui dropdown">
                    <option value="45" mode="UNKNOWN">Assembly (NASM 2.14.02)</option> <!-- Unknown mode. Help needed. -->
                    <option value="46" mode="shell">Bash (5.0.0)</option>
                    <option value="47" mode="UNKNOWN">Basic (FBC 1.07.1)</option> <!-- Unknown mode. Help needed. -->
                    <option value="1011" mode="UNKNOWN">Bosque (latest)</option>  <!-- Unknown mode. Help needed. -->
                    <option value="75" mode="c">C (Clang 7.0.1)</option>
                    <option value="1001" mode="c">C (Clang 10.0.1)</option>
                    <option value="48" mode="c">C (GCC 7.4.0)</option>
                    <option value="49" mode="c">C (GCC 8.3.0)</option>
                    <option value="50" mode="c">C (GCC 9.2.0)</option>
                    <option value="51" mode="csharp">C# (Mono 6.6.0.161)</option>
                    <option value="76" mode="cpp">C++ (Clang 7.0.1)</option>
                    <option value="1002" mode="cpp">C++ (Clang 10.0.1)</option>
                    <option value="52" mode="cpp">C++ (GCC 7.4.0)</option>
                    <option value="53" mode="cpp">C++ (GCC 8.3.0)</option>
                    <option value="54" mode="cpp">C++ (GCC 9.2.0)</option>
                    <option value="1003" mode="c">C3 (latest)</option> <!-- Replacement mode. Help needed. -->
                    <option value="86" mode="clojure">Clojure (1.10.1)</option>
                    <option value="77" mode="UNKNOWN">COBOL (GnuCOBOL 2.2)</option> <!-- Unknown mode. Help needed. -->
                    <option value="55" mode="UNKNOWN">Common Lisp (SBCL 2.0.0)</option> <!-- Unknown mode. Help needed. -->
                    <option value="56" mode="UNKNOWN">D (DMD 2.089.1)</option> <!-- Unknown mode. Help needed. -->
                    <option value="57" mode="UNKNOWN">Elixir (1.9.4)</option> <!-- Unknown mode. Help needed. -->
                    <option value="58" mode="UNKNOWN">Erlang (OTP 22.2)</option> <!-- Unknown mode. Help needed. -->
                    <option value="44" mode="plaintext">Executable</option>
                    <option value="87" mode="fsharp">F# (.NET Core SDK 3.1.202)</option>
                    <option value="59" mode="UNKNOWN">Fortran (GFortran 9.2.0)</option> <!-- Unknown mode. Help needed. -->
                    <option value="60" mode="go">Go (1.13.5)</option>
                    <option value="88" mode="UNKNOWN">Groovy (3.0.3)</option> <!-- Unknown mode. Help needed. -->
                    <option value="61" mode="UNKNOWN">Haskell (GHC 8.8.1)</option> <!-- Unknown mode. Help needed. -->
                    <option value="62" mode="java">Java (OpenJDK 13.0.1)</option>
                    <option value="1004" mode="java">Java (OpenJDK 14.0.1)</option>
                    <option value="1005" mode="java">Java Test (OpenJDK 14.0.1, JUnit Platform Console Standalone 1.6.2)</option>
                    <option value="63" mode="javascript">JavaScript (Node.js 12.14.0)</option>
                    <option value="78" mode="kotlin">Kotlin (1.3.70)</option>
                    <option value="64" mode="lua">Lua (5.3.5)</option>
                    <option value="1006" mode="c">MPI (OpenRTE 3.1.3) with C (GCC 8.3.0)</option>
                    <option value="1007" mode="cpp">MPI (OpenRTE 3.1.3) with C++ (GCC 8.3.0)</option>
                    <option value="1008" mode="python">MPI (OpenRTE 3.1.3) with Python (3.7.3)</option>
                    <option value="1009" mode="python">Nim (stable)</option> <!-- Replacement mode. Help needed. -->
                    <option value="79" mode="objective-c">Objective-C (Clang 7.0.1)</option>
                    <option value="65" mode="UNKNOWN">OCaml (4.09.0)</option> <!-- Unknown mode. Help needed. -->
                    <option value="66" mode="UNKNOWN">Octave (5.1.0)</option> <!-- Unknown mode. Help needed. -->
                    <option value="67" mode="pascal">Pascal (FPC 3.0.4)</option>
                    <option value="85" mode="perl">Perl (5.28.1)</option>
                    <option value="68" mode="php">PHP (7.4.1)</option>
                    <option value="43" mode="plaintext">Plain Text</option>
                    <option value="69" mode="UNKNOWN">Prolog (GNU Prolog 1.4.5)</option> <!-- Unknown mode. Help needed. -->
                    <option value="70" mode="python">Python (2.7.17)</option>
                    <option value="71" mode="python">Python (3.8.1)</option>
                    <option value="1010" mode="python">Python for ML (3.7.3)</option>
                    <option value="80" mode="r">R (4.0.0)</option>
                    <option value="72" mode="ruby">Ruby (2.7.0)</option>
                    <option value="73" mode="rust">Rust (1.40.0)</option>
                    <option value="81" mode="UNKNOWN">Scala (2.13.2)</option> <!-- Unknown mode. Help needed. -->
                    <option value="82" mode="sql">SQL (SQLite 3.27.2)</option>
                    <option value="83" mode="swift">Swift (5.2.3)</option>
                    <option value="74" mode="typescript">TypeScript (3.7.4)</option>
                    <option value="84" mode="vb">Visual Basic.Net</option> <!-- (vbnc 0.0.0.5943) -->
                </select>
            </div>
            <div class="item fitted borderless wide screen only">
                <div class="ui input">
                    <input id="compiler-options" type="text" placeholder="Compiler options"></input>
                </div>
            </div>
            <div class="item borderless wide screen only">
                <div class="ui input">
                    <input id="command-line-arguments" type="text" placeholder="Command line arguments"></input>
                </div>
            </div>
            <div class="item no-left-padding borderless">
                <button id="run-btn" class="ui primary labeled icon button"><i class="play icon"></i>Run (F9)</button>
            </div>
            <div id="navigation-message" class="item borderless">
                <span class="navigation-message-text"></span>
            </div>
        </div>
        <div class="right menu">
            <div id="updates" class="link item changelogfy-widget">
                <i class="fitted bell icon"></i>
            </div>
            <div class="ui dropdown item site-links">
                More
                <i class="dropdown icon"></i>
                <div class="menu">
                    <!-- <a id="about" class="link item" target="_blank" href="https://judge0.com/about"><i class="info circle icon"></i> About</a> -->
                    <a id="about" class="link item" target="_blank" href="https://rapidapi.com/hermanzdosilovic/api/judge0"><i class="server icon"></i> API</a>
                    <div class="divider"></div>
                    <a class="item" target="_blank" href="https://www.patreon.com/hermanzdosilovic"><i
                            class="patreon icon"></i>
                        Become a Patron</a>
                    <a class="item" target="_blank" href="https://paypal.me/hermanzdosilovic"><i
                            class="paypal icon"></i>
                        Donate with PayPal</a>
                    <div class="divider"></div>
                    <a class="item" target="_blank" href="https://github.com/judge0/ide"><i class="github icon"></i>
                        View source
                        code on Github</a>
                    <a class="item" target="_blank" href="https://github.com/judge0/ide/issues/new"><i
                            class="exclamation circle icon"></i> Report an issue</a>
                    <div class="divider"></div>
                    <a class="item" target="_blank" href="https://forms.gle/p3KpGYSjxAbvGUft9"><i class="envelope icon"></i>
                        Subscribe
                        to Judge0 newsletter</a>
                    <a class="item" target="_blank" href="https://discord.gg/6dvxeA8"><i
                            class="discord icon"></i> Join a Discord server</a>
                    <div class="divider"></div>
                    <a class="item" target="_blank" href="mailto:hermanz.dosilovic@gmail.com"><i
                            class="paper plane icon"></i>
                        Contact the author</a>
                    <a class="item" target="_blank" href="https://hermanz.dosilovic.com"><i class="user icon"></i> About
                        the
                        author</a>
                    <div class="divider"></div>
                    <a class="item" target="_blank"
                        href="https://www.reddit.com/submit?url=https%3A%2F%2Fide.judge0.com&title=Judge0%20IDE"
                        style="background-color: #ff4500 !important; color: white !important;"><i
                            class="reddit icon"></i> Share
                        on Reddit</a>
                    <a class="item" target="_blank"
                        href="https://twitter.com/intent/tweet?text=Judge0%20IDE&url=https%3A%2F%2Fide.judge0.com&via=hermanzvonimir"
                        style="background-color: #1da1f2 !important; color: white !important;"><i
                            class="twitter icon"></i>
                        Share on Twitter</a>
                    <a class="item" target="_blank"
                        href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fide.judge0.com"
                        style="background-color: #1877f2 !important; color: white !important;"><i
                            class="facebook icon"></i>
                        Share on Facebook</a>
                </div>
            </div>
        </div>
    </div>

    <div id="site-content"></div>

    <div id="site-modal" class="ui modal">
        <div class="header">
            <i class="close icon"></i>
            <span id="title"></span>
        </div>
        <div class="scrolling content"></div>
        <div class="actions">
            <div class="ui small labeled icon cancel button">
                <i class="remove icon"></i>
                Close (ESC)
            </div>
        </div>
    </div>

    <div id="site-settings" class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            <i class="cog icon"></i>
            Settings
        </div>
        <div class="content">
            <div class="ui form">
                <div class="inline fields">
                    <label>Editor Mode</label>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="editor-mode" value="normal" checked="checked">
                            <label>Normal</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="editor-mode" value="vim">
                            <label>Vim</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="editor-mode" value="emacs">
                            <label>Emacs</label>
                        </div>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="redirect-output">
                        <label>Redirect stderr to stdout</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="site-footer">
        <span id="donate-line">
            <a class="item" target="_blank" href="https://www.patreon.com/hermanzdosilovic"><i class="patreon icon" style="color: #f06553;"></i> Become a Patron</a>
            ·
            <a class="item" target="_blank" href="https://paypal.me/hermanzdosilovic"><i class="paypal icon" style="color: #00457c;"></i></i> Donate with PayPal</a>
        </span>
        <div id="editor-status-line"></div>
        <span>© 2016-2020 <a href="https://judge0.com">Judge0</a> · Powered by <a href="https://rapidapi.com/hermanzdosilovic/api/judge0">the most advanced open-source online code execution system</a>
        <span id="status-line"></span>
    </div>
    <script>
        let CLF_config = {
            selector: ".changelogfy-widget",
            app_id: "f6f982d0-3d91-4b1c-a3ce-b0eb54606c4e"
        };
    </script>
    <script async src="https://widget.changelogfy.com/index.js"></script>
</body>

</html>
