function scookie(name, value, days) {
    var expire = new Date();
    expire.setDate(expire.getDate() + days);
    document.cookie = name + '=' + escape(value) + ';expires=' + expire.toGMTString();
    return true
}
function gcookie(name) {
    if (document.cookie.length > 0) {
        start = document.cookie.indexOf(name + "=");
        pos = start + name.length + 1;
        if (start != 0) {
            start = document.cookie.indexOf("; " + name + "=");
            pos = start + name.length + 3;
        }
        if (start != -1) {
            start = pos;
            end = document.cookie.indexOf(";", start);
            if (end == -1) {
                end = document.cookie.length;
            }
            return unescape(document.cookie.substring(start, end));
        }
    }
    return '';
}
if (gcookie('visit_name') == '' || gcookie('nb_visits') == '') {
    name = prompt('Quel est votre nom?', 'anonyme');
    if (name == '') {
        name = 'visit_name';
    }
    scookie('$visit_name', name, 100);
    nb_visits = 1;
}
else {
    name = gcookie('visit_name');
    nb_visits = Number(gcookie('nb_visits')) + 1;
}

scookie('nb_visits', nb_visits, 100);
document.getElementById('visit_name').innerHTML = name;
document.getElementById('nb_visits').innerHTML = nb_visits;