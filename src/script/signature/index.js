var Signature = {
    init: initSignature
};

function initSignature() {
    var _logSirna = 
        '          __    __       ___       __   __               '     + '\n' +
        '         |  |  |  |     /   \\     |  | |  |              '    + '\n' +
        '         |  |__|  |    /  ^  \\    |  | |  |              '    + '\n' +
        '         |   __   |   /  /_\\  \\   |  | |  |              '   + '\n' +
        '         |  |  |  |  /  _____  \\  |  | |  `----.         '    + '\n' +
        '         |__|  |__| /__/     \\__\\ |__| |_______|         '   + '\n' +
        '        _______. __  .______     .__   __.      ___      '     + '\n' +
        '       /       ||  | |   _  \\    |  \\ |  |     /   \\     '  + '\n' +
        '      |   (----`|  | |  |_)  |   |   \\|  |    /  ^  \\    '   + '\n' +
        '       \\   \\    |  | |      /    |  . `  |   /  /_\\  \\   ' + '\n' +
        '   .----)   |   |  | |  |\\  \\----|  |\\   |  /  _____  \\  ' + '\n' +
        '   |_______/    |__| | _| `._____|__| \\__| /__/     \\__\\ ';

    _logSirna += '\n\n\               http://github.com/zabkasirna\n';

    console.debug( _logSirna );

    $.ajax({
        method: 'GET',
        url: 'https://api.github.com/repos/zabkasirna/russelandrizky/commits/master',
        dataType: 'json'
    })
    .done( function(d) {
        console.debug(
            'latest_commit: ' + d.url
        );
    });
}

module.exports = Signature;

/*
https://api.github.com/repos/zabkasirna/russelandrizky/commits/master
 */