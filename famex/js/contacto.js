document.getElementById("exportBtn-excel").addEventListener("click", function () {
  // Exportar la tabla a Excel
  $("#myTable").tableExport({
    type: "xls",
    fileName: "Directorio_FAMEX",
  });
});


document.getElementById("exportBtn-pdf").addEventListener("click", function () {
  // Crear un elemento div temporal para contener el contenido a exportar
  var exportContent = document.createElement("div");

  // Agregar el logo y el título al contenido a exportar
  var logo = document.createElement("img");
  logo.src = "img/logofamexcolores.png";
  logo.alt = "Logo";
  logo.style.height = "50px";
  logo.style.float = "right";
  exportContent.appendChild(logo);

  var title = document.createElement("h4");
  title.textContent = "Directorio de FAMEX";
  title.style.textAlign = "center";
  title.style.marginBottom = "2rem";
  exportContent.appendChild(title);

  // Agregar la tabla al contenido a exportar
  var table = document.getElementById("myTable").cloneNode(true);
  exportContent.appendChild(table);

  // Convertir el contenido a PDF
  html2pdf().set({
    filename: "Directorio_FAMEX",
    margin: 10,
    html2canvas: { scale: 2 },
    jsPDF: { format: "a4", orientation: "portrait" }
  }).from(exportContent).save();
});

