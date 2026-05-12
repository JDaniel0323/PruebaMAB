async function descargarPDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  const comboPais = document.getElementById("countrySelect");
  const urlParams = new URLSearchParams(window.location.search);
  const pais = comboPais.value || urlParams.get("country") || "Desconocido";

  console.log("País:", pais);

  doc.text("Reporte de Universidades", 10, 10);
  doc.text(`País: ${pais}`, 10, 20);

  let y = 30;
  document.querySelectorAll("#uniTable tr").forEach((tr) => {
    if (tr.cells.length > 0) {
      doc.text(`- ${tr.cells[0].innerText}`, 10, y);
      y += 10;
    }
  });

  const pdfBlob = doc.output("blob");
  const formData = new FormData();

  formData.append("pdf", pdfBlob, "reporte.pdf");
  formData.append("country", pais);

  const response = await fetch("/MAB/api/save-pdf.php", {
    method: "POST",
    body: formData,
  });

  if (response.ok) {
    alert("Guardado sin novedad");
    location.reload();
  } else {
    alert("Error al guardar");
  }
}
