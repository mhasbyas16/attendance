function downloadCSV(csv, filename) {
    var fileCSV;
    var linkDonwload;
    // File CSV
    fileCSV = new Blob([csv], {type: "text/csv"});
    // Link download
    linkDonwload = document.createElement("a");
    // Nama file
    linkDonwload.download = filename;
    // Membuat link ke file
    linkDonwload.href = window.URL.createObjectURL(fileCSV);
    // Menyembunyikan link download
    linkDonwload.style.display = "none";
    // Menambahkan link ke DOM
    document.body.appendChild(linkDonwload);
    // Klik link download
    linkDonwload.click();
}


function exportTabelKeCSV(filename) {
    var csv = [];
 var baris = document.querySelectorAll("table tr");
 
    for (var i = 0; i < baris.length; i++) {
  var row = [], cols = baris[i].querySelectorAll("td, th");
  
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
  csv.push(row.join(","));  
 }
    // Download file CSV
    downloadCSV(csv.join("\n"), filename);
}