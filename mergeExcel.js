
function exportDataAsync(tb) {
    return new Promise((resolve, reject) => {
        tb.exportTo('excel', {
            destinationType: "server",
            url: ""
        }, (data) => {
            resolve(data);
        });
    });
}

async function getFileBlobWrksheets(tab){
    const data = await exportDataAsync(tab);
    const arrayBuffer = data.data.buffer;

    const dataa = new Uint8Array(arrayBuffer);
    const workbook = new ExcelJS.Workbook()
    await workbook.xlsx.load(dataa.buffer)
    worksheet1 = workbook.getWorksheet(1)
    return worksheet1
}
function mergeWorksheets(worksheet1, worksheet2,sheetname) {
    const mergedWorkbook = new ExcelJS.Workbook();
    const mergedWorksheet = mergedWorkbook.addWorksheet(sheetname);
    dim1 = worksheet1.dimensions
    dim2 = worksheet2.dimensions
    dim3 = calculateMergedDimensions(dim1, dim2);
    mergeCells(mergedWorksheet, dim1, dim2);
    appendworksheet1(mergedWorksheet,worksheet1,dim1,dim3);
    appendworksheet2(mergedWorksheet,worksheet2,dim1,dim2,dim3);
    setHeaderCell(mergedWorksheet, dim1,sheetname);
    setWorksheetProperties(mergedWorksheet, worksheet1);
    return mergedWorkbook;

}
function mergeCells(mergedWorksheet, dim1, dim2) {
    mergedWorksheet.mergeCells(dim1.model.top + 4, dim1.model.left, dim1.model.top + 4, dim1.model.right);
    mergedWorksheet.mergeCells(dim2.model.top + 4, dim2.model.left + dim1.model.right + 2, dim2.model.top + 4, dim1.model.right + dim2.model.right + 2);
}
function appendworksheet1(mergedWorksheet,worksheet1,dim1,dim3){
    worksheet1.eachRow((row, rowNumber) => {
        row.eachCell((cell, colNumber) => {
          mergedWorksheet.getCell(rowNumber + 4, colNumber).value = cell.value;
          mergedWorksheet.getCell(rowNumber + 4, colNumber).style = cell.style;
        });        
      })
}
function appendworksheet2(mergedWorksheet,worksheet2,dim1,dim2,dim3){
    worksheet2.eachRow((row, rowNumber) => {
        row.eachCell((cell, colNumber) => {
          //make cell a1 and b1 have only one text
        {
          mergedWorksheet.getCell(rowNumber + 4, colNumber +dim1.model.right +2).value = cell.value;
          mergedWorksheet.getCell(rowNumber + 4, colNumber +dim1.model.right +2).style = cell.style;
          mergedWorksheet.getCell(rowNumber + 4,colNumber + dim1.model.right +2).font = cell.font;
          mergedWorksheet.getCell(rowNumber + 4, colNumber +dim1.model.right +2).alignment = cell.alignment;
          mergedWorksheet.getCell(rowNumber + 4,colNumber + dim1.model.right +2).border = cell.border;
        }
        });
      })
}


function setHeaderCell(mergedWorksheet, dim1,header) {
    mergedWorksheet.getCell(dim1.model.top, dim1.model.left + 1).value = header;
    mergedWorksheet.getCell(dim1.model.top, dim1.model.left + 1).font = {
      name: 'Arial Black',
      family: 4,
      size: 16,
      underline: 'single',
      bold: true,
    };
    mergedWorksheet.getCell(dim1.model.top, dim1.model.left + 1).alignment = { vertical: 'middle', horizontal: 'center' };
    mergedWorksheet.mergeCells(dim1.model.top, dim1.model.left + 1, dim1.model.top + 3, dim1.model.right + dim2.model.right + 1);
  }
function setWorksheetProperties(mergedWorksheet, worksheet) {
    mergedWorksheet.properties = worksheet.properties;
    mergedWorksheet.pageSetup = worksheet.pageSetup;
    mergedWorksheet.views = worksheet.views;
}

function calculateMergedDimensions(dim1, dim2) {
    return {
      "model": {
        "top": Math.min(dim1.model.top, dim2.model.top),
        "left": Math.min(dim1.model.left, dim2.model.left),
        "bottom": Math.max(dim1.model.bottom, dim2.model.bottom) + 4,
        "right": dim1.model.right + dim2.model.right + 3
      }
    };
  }
async function exportAndHandleData(piv,pin,file_name) {
    try {
        const worksheet1 = await getFileBlobWrksheets(piv);
        const worksheet2 = await getFileBlobWrksheets(pin);
        const mergedWorkbook = mergeWorksheets(worksheet1, worksheet2,file_name);
        const buffer = await mergedWorkbook.xlsx.writeBuffer();
        const url = createObjectURL(buffer);
        downloadFile(url, file_name);
      } catch (e) {
        console.log(e);
      }
}
function createObjectURL(buffer) {
    const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
    return window.URL.createObjectURL(blob);
  }
  
  function downloadFile(url, filename) {
    const a = document.createElement("a");
    document.body.appendChild(a);
    a.style = "display: none";
    a.href = url;
    a.download = filename;
    a.click();
    window.URL.revokeObjectURL(url);
  }

downloadURL = function (data, fileName) {
    var a;
    a = document.createElement('a');
    a.href = data;
    a.download = fileName;
    document.body.appendChild(a);
    a.style = 'display: none';
    a.click();
    a.remove();
};
