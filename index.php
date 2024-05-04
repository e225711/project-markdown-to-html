<!-- index.php -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Markdown to HTML</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
    <script src="javascript/main.js"></script>
  </head>
  <body>
    <header>
        <h1>Markdown to HTML</h1>
    </header>

    <div class="container">
      <div id="editor-container">
      </div>
      <div id="result-container">
        <button id="preview-button">Preview</button>
        <button id="html-button">HTML</button>
        <button id="download-button">Download</button>
        <div id="result"></div>
      </div>
    </div>

    <footer>
        <p>2024 kohagura8888</p>
    </footer>
  </body>
</html>
