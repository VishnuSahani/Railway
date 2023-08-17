<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PDF Viewer</title>
</head>
<body>
<h1>PDF Viewer</h1>
<input type="file" id="pdfFileInput">
<div id="pdfContainer"></div>

<script>
  const pdfFileInput = document.getElementById('pdfFileInput');
  const pdfContainer = document.getElementById('pdfContainer');

  pdfFileInput.addEventListener('change', function() {
    const file = pdfFileInput.files[0];
    if (file && file.type === 'application/pdf') {
      const reader = new FileReader();
      reader.onload = function(event) {
        const pdfUrl = event.target.result;
        const embedTag = `<embed src="${pdfUrl}" type="application/pdf" width="40%" height="200px" />`;
        pdfContainer.innerHTML = embedTag;
      };
      reader.readAsDataURL(file);
    } else {
      pdfContainer.innerHTML = '<p>Please select a valid PDF file.</p>';
    }
  });
</script>
</body>
</html>
