// main.js
require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs' } });
require(['vs/editor/editor.main'], function () {
    var editor = monaco.editor.create(document.getElementById('editor-container'), {
        value: '',
        language: 'markdown'
    });

    document.getElementById('preview-button').addEventListener('click', function () {
        var editorValue = editor.getValue();

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'preview.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {

                console.log(xhr.responseText);

                document.getElementById('result').innerHTML = xhr.responseText;
            } else {

                console.error('Request failed');
            }
        };


        xhr.send('text=' + encodeURIComponent(editorValue));
    });

    document.getElementById('html-button').addEventListener('click', function () {
        var editorValue = editor.getValue();

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'html.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {

                console.log(xhr.responseText);

                document.getElementById('result').innerHTML = xhr.responseText;
            } else {

                console.error('Request failed');
            }
        };


        xhr.send('text=' + encodeURIComponent(editorValue));
    });

    document.getElementById('download-button').addEventListener('click', function () {
        var editorValue = editor.getValue();

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'download.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {

                console.log(xhr.responseText);
                
                var blob = new Blob([xhr.responseText], { type: 'text/html' });
                var url = window.URL.createObjectURL(blob);

                // ダウンロード用のリンクを作成し、自動的にクリック
                var a = document.createElement('a');
                a.href = url;
                a.download = 'converted_html.html';
                document.body.appendChild(a);
                a.click();

                // 不要なリソースを解放
                window.URL.revokeObjectURL(url);

            } else {

                console.error('Request failed');
            }
        };

        xhr.send('text=' + encodeURIComponent(editorValue));
    });
});
