<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?= isset($titre_header) ? e($titre_header) : 'Oxy EDITOR'; ?></title> 
    <link rel="icon" href="<?= INC.DS.'images'.DS.'ico'.DS.'favicon.ico'; ?>">   
    <link rel="stylesheet" href="<?= INC.DS.'ccs'.DS.'styles.css'; ?>">
    <link rel="stylesheet" href="<?= INC.DS.'ccs'.DS.'bootstrap.css'; ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link id="favicon" rel="shortcut icon" type="image/png" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAhFBMVEUAAAAAAAD////p6ekLCwt+fn43NzccHBzT09PIyMjFxcWysrKnp6ekpKSfn5+ampqNjY2IiIiCgoJ0dHRubm5kZGRdXV1PT09JSUlEREQjIyMTExMHBwf7+/v19fXg4ODW1tbAwMCRkZGDg4N5eXloaGhTU1M+Pj4vLy8sLCwlJSURERGNXQbaAAAAAXRSTlN4HjghaAAAAI1JREFUGNNlz0cSwkAQQ9HRdyI542xyhvvfj5opFoC167dolYzRT/5v6Qui+P6Bp3wLDakDPwM4SQGdA2B1mdFqgRw0C3wNHMVB9dr+wJMeFCHpBiqjG4n8PVEAQU5klOPtoNacpTxPRjOSrBoleA3EtmUrm5C5rpQyHSsHBWeV2JZ2lEsvhctek3GT+W8jMQY7SBmDowAAAABJRU5ErkJggg==">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.7/themes/default/style.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/codemirror.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/lint.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/dialog/dialog.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
	<style type="text/css">
		h1,
		h1 a,
		h1 a:hover {
			margin: 0;
			padding: 0;
			color: #444;
			cursor: default;
			text-decoration: none;
		}

		#files {
			padding: 20px 10px;
			margin-bottom: 10px;
		}

		#files>div {
			overflow: auto;
		}

		#path {
			margin-left: 10px;
		}

		.dropdown-item.close {
			font-size: 1em !important;
			font-weight: normal;
			opacity: 1;
		}

		#loading {
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			z-index: 9;
			display: none;
			position: absolute;
			background: rgba(0, 0, 0, 0.5);
		}

		.lds-ring {
			margin: 0 auto;
			position: relative;
			width: 64px;
			height: 64px;
			top: 45%;
		}

		.lds-ring div {
			box-sizing: border-box;
			display: block;
			position: absolute;
			width: 51px;
			height: 51px;
			margin: 6px;
			border: 6px solid #fff;
			border-radius: 50%;
			animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
			border-color: #fff transparent transparent transparent;
		}

		.lds-ring div:nth-child(1) {
			animation-delay: -0.45s;
		}

		.lds-ring div:nth-child(2) {
			animation-delay: -0.3s;
		}

		.lds-ring div:nth-child(3) {
			animation-delay: -0.15s;
		}

		@keyframes lds-ring {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}

		.dropdown-menu {
			min-width: 12rem;
		}

		#terminal {
			padding: 5px 10px;
		}

		#terminal .toggle {
			cursor: pointer;
		}

		#terminal pre {
			background: black;
			color: #fff;
			padding: 5px 10px;
			border-radius: 5px 5px 0 0;
			margin: 5px 0 0 0;
			height: 200px;
			overflow-y: auto;
		}

		#terminal input.command {
			width: 100%;
			background: #333;
			color: #fff;
			border: 0;
			border-radius: 0 0 5px 5px;
			margin-bottom: 5px;
			padding: 5px;
		}

		#terminal .btn {
			padding: .5rem .4rem;
			font-size: .875rem;
			line-height: .5;
			border-radius: .2rem;
		}

		#terminal #prompt:fullscreen pre {
			margin: 0;
			border-radius: 0;
		}

		#terminal #prompt:fullscreen input.command {
			border-radius: 0;
		}
    </style>
    <!-- script -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= INC.DS.'js'.DS; ?>script.js" type="text/javascript"></script>
    <script src="<?= INC.DS.'js'.DS; ?>jquery.js" type="text/javascript"></script>
    <script src="<?= INC.DS.'js'.DS; ?>bootstrap.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.7/jstree.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/codemirror.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/mode/javascript/javascript.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/mode/css/css.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/mode/php/php.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/mode/xml/xml.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/mode/htmlmixed/htmlmixed.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/mode/markdown/markdown.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/mode/clike/clike.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jshint/2.10.2/jshint.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jsonlint/1.6.0/jsonlint.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/lint.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/javascript-lint.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/json-lint.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/css-lint.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/search/search.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/search/searchcursor.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/search/jump-to-line.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/dialog/dialog.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
	<script type="text/javascript">
		var editor,
			modes = {
				"js": "javascript",
				"json": "javascript",
				"md": "text/x-markdown"
			},
			last_keyup_press = false,
			last_keyup_double = false;

		function alertBox(title, message, color) {
			iziToast.show({
				title: title,
				message: message,
				color: color,
				position: "bottomRight",
				transitionIn: "fadeInUp",
				transitionOut: "fadeOutRight",
			});
		}

		function reloadFiles(hash) {
			$.post("<?= $_SERVER['PHP_SELF'] ?>", {
				action: "reload"
			}, function(data) {
				$("#files > div").jstree("destroy");
				$("#files > div").html(data.data);
				$("#files > div").jstree();
				$("#files > div a:first").click();
				$("#path").html("");

				window.location.hash = hash || "/";

				if (hash) {
					$("#files a[data-file=\"" + hash + "\"], #files a[data-dir=\"" + hash + "\"]").click();
				}
			});
		}

		function sha512(string) {
			return crypto.subtle.digest("SHA-512", new TextEncoder("UTF-8").encode(string)).then(buffer => {
				return Array.prototype.map.call(new Uint8Array(buffer), x => (("00" + x.toString(16)).slice(-2))).join("");
			});
		}

		function setCookie(name, value, timeout) {
			if (timeout) {
				var date = new Date();
				date.setTime(date.getTime() + (timeout * 1000));
				timeout = "; expires=" + date.toUTCString();
			} else {
				timeout = "";
			}

			document.cookie = name + "=" + value + timeout + "; path=/";
		}

		function getCookie(name) {
			var cookies = decodeURIComponent(document.cookie).split(';');

			for (var i = 0; i < cookies.length; i++) {
				if (cookies[i].trim().indexOf(name + "=") == 0) {
					return cookies[i].trim().substring(name.length + 1).trim();
				}
			}

			return false;
		}

		$(function() {
			editor = CodeMirror.fromTextArea($("#editor")[0], {
				lineNumbers: true,
				mode: "application/x-httpd-php",
				indentUnit: 4,
				indentWithTabs: true,
				lineWrapping: true,
				gutters: ["CodeMirror-lint-markers"],
				lint: true
			});

			$("#files > div").jstree({
				state: {
					key: "pheditor"
				},
				plugins: ["state"]
			});

			$("#files").on("dblclick", "a[data-file]", function(event) {
				event.preventDefault();
				<?php

				$base_dir = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace(DS, '/', MAIN_DIR));

				if (substr($base_dir, 0, 1) !== '/') {
					$base_dir = '/' . $base_dir;
				}

				?>
				window.open("<?= $base_dir ?>" + $(this).attr("data-file"));
			});

			$("a.change-password").click(function() {
				var password = prompt("Please enter new password:");

				if (password != null && password.length > 0) {
					$.post("<?= $_SERVER['PHP_SELF'] ?>", {
						action: "password",
						password: password
					}, function(data) {
						alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");
					});
				}
			});

			$(".dropdown .new-file").click(function() {
				var path = $("#path").html();

				if (path.length > 0) {
					var name = prompt("Please enter file name:", "new-file.php"),
						end = path.substring(path.length - 1),
						file = "";

					if (name != null && name.length > 0) {
						if (end == "/") {
							file = path + name;
						} else {
							file = path.substring(0, path.lastIndexOf("/") + 1) + name;
						}

						$.post("<?= $_SERVER['PHP_SELF'] ?>", {
							action: "save",
							file: file,
							data: ""
						}, function(data) {
							alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");

							if (data.error == false) {
								reloadFiles();
							}
						});
					}
				} else {
					alertBox("Warning", "Please select a file or directory", "yellow");
				}
			});

			$(".dropdown .new-dir").click(function() {
				var path = $("#path").html();

				if (path.length > 0) {
					var name = prompt("Please enter directory name:", "new-dir"),
						end = path.substring(path.length - 1),
						dir = "";

					if (name != null && name.length > 0) {
						if (end == "/") {
							dir = path + name;
						} else {
							dir = path.substring(0, path.lastIndexOf("/") + 1) + name;
						}

						$.post("<?= $_SERVER['PHP_SELF'] ?>", {
							action: "make-dir",
							dir: dir
						}, function(data) {
							alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");

							if (data.error == false) {
								reloadFiles();
							}
						});
					}
				} else {
					alertBox("Warning", "Please select a file or directory", "yellow");
				}
			});

			$(".dropdown .save").click(function() {
				var path = $("#path").html(),
					data = editor.getValue();

				if (path.length > 0) {
					sha512(data).then(function(digest) {
						$("#digest").val(digest);
					});

					$.post("<?= $_SERVER['PHP_SELF'] ?>", {
						action: "save",
						file: path,
						data: data
					}, function(data) {
						alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");
					});
				} else {
					alertBox("Warning", "Please select a file", "yellow");
				}
			});

			$(".dropdown .close").click(function() {
				editor.setValue("");
				$("#files > div a:first").click();
				$(".dropdown").find(".save, .delete, .rename, .reopen, .close").addClass("disabled");
			});

			$(".dropdown .delete").click(function() {
				var path = $("#path").html();

				if (path.length > 0) {
					if (confirm("Are you sure to delete this file?")) {
						$.post("<?= $_SERVER['PHP_SELF'] ?>", {
							action: "delete",
							path: path
						}, function(data) {
							alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");

							if (data.error == false) {
								reloadFiles();
							}
						});
					}
				} else {
					alertBox("Warning", "Please select a file or directory", "yellow");
				}
			});

			$(".dropdown .rename").click(function() {
				var path = $("#path").html(),
					split = path.split("/"),
					file = split[split.length - 1],
					dir = split[split.length - 2],
					new_file_name;

				if (path.length > 0) {
					if (file.length > 0) {
						new_file_name = file;
					} else if (dir.length > 0) {
						new_file_name = dir;
					} else {
						new_file_name = "new-file";
					}

					var name = prompt("Please enter new name:", new_file_name);

					if (name != null && name.length > 0) {
						$.post("<?= $_SERVER['PHP_SELF'] ?>", {
							action: "rename",
							path: path,
							name: name
						}, function(data) {
							alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");

							if (data.error == false) {
								reloadFiles(path.substring(0, path.lastIndexOf("/")) + "/" + name);
							}
						});
					}
				} else {
					alertBox("Warning", "Please select a file or directory", "yellow");
				}
			});

			$(".dropdown .reopen").click(function() {
				var path = $("#path").html();

				if (path.length > 0) {
					$(window).trigger("hashchange");
				}
			});

			$(window).resize(function() {
				if (window.innerWidth >= 720) {
					var terminalHeight = $("#terminal").length > 0 ? $("#terminal").height() : 0,
						height = window.innerHeight - $(".CodeMirror")[0].getBoundingClientRect().top - terminalHeight - 30;

					$("#files, .CodeMirror").css({
						"height": height + "px"
					});
				} else {
					$("#files > div, .CodeMirror").css({
						"height": ""
					});
				}

				if (document.fullscreen) {
					$("#prompt pre").height($(window).height() - $("#prompt input.command").height() - 20);
				}
			});

			$(window).resize();

			$(".alert").click(function() {
				$(this).fadeOut();
			});

			$(document).bind("keyup keydown", function(event) {
				if ((event.ctrlKey || event.metaKey) && event.shiftKey) {
					if (event.keyCode == 78) {
						$(".dropdown .new-file").click();
						event.preventDefault();

						return false;
					} else if (event.keyCode == 83) {
						$(".dropdown .save").click();
						event.preventDefault();

						return false;
					} else if (event.keyCode == 76) {
						$("#terminal .toggle").click();
						event.preventDefault();

						return false;
					}
				}
			});

			$(document).bind("keyup", function(event) {
				if (event.keyCode == 27) {
					if (last_keyup_press == true) {
						last_keyup_double = true;

						$("#fileMenu").click();
						$("body").focus();
					} else {
						last_keyup_press = true;

						setTimeout(function() {
							if (last_keyup_double === false) {
								if (document.activeElement.tagName.toLowerCase() == "textarea") {
									if ($("#terminal #prompt").hasClass("show")) {
										$("#terminal .command").focus();
									} else {
										$(".jstree-clicked").focus();
									}
								} else if (document.activeElement.tagName.toLowerCase() == "input") {
									$(".jstree-clicked").focus();
								} else {
									editor.focus();
								}
							}

							last_keyup_press = false;
							last_keyup_double = false;
						}, 250);
					}
				}
			});

			$(window).on("hashchange", function() {
				var hash = window.location.hash.substring(1),
					data = editor.getValue();

				if (hash.length > 0) {
					sha512(data).then(function(digest) {
						if ($("#digest").val().length < 1 || $("#digest").val() == digest) {
							if (hash.substring(hash.length - 1) == "/") {
								var dir = $("a[data-dir='" + hash + "']");

								if (dir.length > 0) {
									editor.setValue("");
									$("#digest").val("");
									$("#path").html(hash);
									$(".dropdown").find(".save, .reopen, .close").addClass("disabled");
									$(".dropdown").find(".delete, .rename").removeClass("disabled");
								}
							} else {
								var file = $("a[data-file='" + hash + "']");

								if (file.length > 0) {
									$("#loading").fadeIn(250);

									$.post("<?= $_SERVER['PHP_SELF'] ?>", {
										action: "open",
										file: encodeURIComponent(hash)
									}, function(data) {
										if (data.error == true) {
											alertBox("Error", data.message, "red");

											return false;
										}

										editor.setValue(data.data);
										editor.setOption("mode", "application/x-httpd-php");

										sha512(data.data).then(function(digest) {
											$("#digest").val(digest);
										});

										if (hash.lastIndexOf(".") > 0) {
											var extension = hash.substring(hash.lastIndexOf(".") + 1);

											if (modes[extension]) {
												editor.setOption("mode", modes[extension]);
											}
										}

										$("#editor").attr("data-file", hash);
										$("#path").html(hash).hide().fadeIn(250);
										$(".dropdown").find(".save, .delete, .rename, .reopen, .close").removeClass("disabled");

										$("#loading").fadeOut(250);
									});
								}
							}
						} else if (confirm("Discard changes?")) {
							$("#digest").val("");

							$(window).trigger("hashchange");
						}
					});
				}
			});

			if (window.location.hash.length < 1) {
				window.location.hash = "/";
			} else {
				$(window).trigger("hashchange");
			}

			$("#files").on("click", ".jstree-anchor", function() {
				location.href = $(this).attr("href");
			});

			$(document).ajaxError(function(event, request, settings) {
				var message = "An error occurred with this request.";

				if (request.responseText.length > 0) {
					message = request.responseText;
				}

				if (confirm(message + " Do you want to reload the page?")) {
					location.reload();
				}

				$("#loading").fadeOut(250);
			});

			$(window).keydown(function(event) {
				if ($("#fileMenu[aria-expanded='true']").length > 0) {
					var code = event.keyCode;

					if (code == 78) {
						$(".new-file").click();
					} else if (code == 83) {
						$(".save").click();
					} else if (code == 68) {
						$(".delete").click();
					} else if (code == 82) {
						$(".rename").click();
					} else if (code == 79) {
						$(".reopen").click();
					} else if (code == 67) {
						$(".close").click();
					} else if (code == 85) {
						$(".upload-file").click();
					}
				}
			});

			$(".dropdown .upload-file").click(function() {
				$("#uploadFileModal").modal("show");
				$("#uploadFileModal input").focus();
			});

			$("#uploadFileModal button").click(function() {
				var form = $(this).closest("form"),
					formdata = false;

				form.find("input[name=destination]").val(window.location.hash.substring(1));

				if (window.FormData) {
					formdata = new FormData(form[0]);
				}

				$.ajax({
					url: "<?= $_SERVER['PHP_SELF'] ?>",
					data: formdata ? formdata : form.serialize(),
					cache: false,
					contentType: false,
					processData: false,
					type: "POST",
					success: function(data, textStatus, jqXHR) {
						alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");

						if (data.error == false) {
							reloadFiles();
						}
					}
				});
			});

			var terminal_dir = "";

			$("#terminal .command").keydown(function(event) {
				if (event.keyCode == 13 && $(this).val().length > 0) {
					var _this = $(this)
					_val = _this.val();

					if (_val.toLowerCase() == "clear") {
						$("#terminal pre").html("");
						_this.val("").focus();

						return true;
					}

					_this.prop("disabled", true);
					$("#terminal pre").append("> " + _val + "\n");
					$("#terminal pre").animate({
						scrollTop: $("#terminal pre").prop("scrollHeight")
					});

					$.post("<?= $_SERVER['PHP_SELF'] ?>", {
						action: "terminal",
						command: _val,
						dir: terminal_dir
					}, function(data) {
						if (data.error) {
							$("#terminal pre").append(data.message);
						} else {
							if (data.dir != null) {
								terminal_dir = data.dir;
							}

							if (data.result == null) {
								data.result = "Command not found\n";
							}

							$("#terminal pre").append(data.result);
						}

						$("#terminal pre").animate({
							scrollTop: $("#terminal pre").prop("scrollHeight")
						});
						_this.val("").prop("disabled", false).focus();
					});
				}
			});

			$("#terminal .toggle").click(function() {
				if ($(this).attr("aria-expanded") != "true") {
					$("#terminal .command").focus();
				}
			});

			$('#prompt').on('show.bs.collapse', function() {
				$("#terminal").find(".clear, .copy, .fullscreen").css({
					"display": "block",
					"opacity": "0",
					"margin-right": "-30px"
				}).animate({
					"opacity": "1",
					"margin-right": "0px"
				}, 250);

				if (window.innerWidth >= 720) {
					var height = window.innerHeight - $(".CodeMirror")[0].getBoundingClientRect().top - $("#terminal #prompt").height() - 55;

					$("#files, .CodeMirror").animate({
						"height": height + "px"
					}, 250);
				} else {
					$("#files > div, .CodeMirror").animate({
						"height": ""
					}, 250);
				}

				setCookie("terminal", "1", 86400);
			}).on('hide.bs.collapse', function() {
				$("#terminal").find(".clear, .copy, .fullscreen").fadeOut();

				if (window.innerWidth >= 720) {
					var height = window.innerHeight - $(".CodeMirror")[0].getBoundingClientRect().top - $("#terminal span").height() - 35;

					$("#files, .CodeMirror").animate({
						"height": height + "px"
					}, 250);
				} else {
					$("#files > div, .CodeMirror").animate({
						"height": ""
					}, 250);
				}

				setCookie("terminal", "0", 86400);
			}).on('shown.bs.collapse', function() {
				$("#terminal .command").focus();
			});

			$("#terminal button.clear").click(function() {
				$("#terminal pre").html("");
				$("#terminal .command").val("").focus();
			});

			$("#terminal button.copy").click(function() {
				$("#terminal").append($("<textarea>").html($("#terminal pre").html()));

				element = $("#terminal textarea")[0];
				element.select();
				element.setSelectionRange(0, 99999);
				document.execCommand("copy");

				$("#terminal textarea").remove();
			});

			if (getCookie("terminal") == "1") {
				$("#terminal .toggle").click();
			}

			$("#terminal .fullscreen").click(function() {
				var element = $("#terminal #prompt")[0];

				if (element.requestFullscreen) {
					element.requestFullscreen();

					setTimeout(function() {
						$("#prompt pre").height($(window).height() - $("#prompt input.command").height() - 20);
						$("#prompt input.command").focus();
					}, 500);
				}
			});

			$(window).on("fullscreenchange", function() {
				if (document.fullscreenElement == null) {
					$("#terminal #prompt pre").css("height", "");
					$(window).resize();
				}
			});
		});
	</script>
</head>
<header>
    <h1 class="titre text-center"><b><?= isset($titre_navBar) ? e($titre_navBar) :  'Oxy EDITOR'; ?></b></h1>           
</header>        
<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= BASE_URL ?>"><?= isset($titre_header) ? e($titre_header) : 'Accueil'; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerPrincipal" aria-controls="navbarTogglerPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerPrincipal">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?= nav_menu_admin('nav-link'); ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>             
    <div class="container mt-4">
       <?= $content ?>
    </div> 
<footer class="bg-dark py-4 footer mt-auto">
    <div class="container">
		<strong class="">O</strong>xy<strong class="">G</strong>ène<strong class="">S</strong>tudio <a href="//oxygames.fr" target="_blank">[O.G.S]</a>
    </div>
</footer>
</body>
</html>