const { PDFDocument, PageSizes, StandardFonts, PDFContentStream, PDFPage, drawLinesOfText, rgb } = PDFLib

async function sendEmail() {
    const vCardText = vCard();

    const canvas = document.getElementById("qrCode");

    // Función para generar el código QR
    const qr = new QRious({
        element: canvas,
        value: vCardText,
        size: 100, // Ajusta el tamaño del código QR según tus necesidades
        level: "L", // Nivel de corrección de errores bajo para mayor capacidad
    });

    var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");

    const pdfDoc = await PDFDocument.create()

    const png1 = 'https://pruebasaeva.rf.gd/img/img1.png'
    const png2 = 'https://pruebasaeva.rf.gd/img/logo.png'
    const png3 = 'https://pruebasaeva.rf.gd/img/img2.png'
    const png4 = 'https://pruebasaeva.rf.gd/img/img3.png'

    // Carga el icono como una imagen (puede ser un archivo PNG, SVG, etc.)
    const icon = 'https://pruebasaeva.rf.gd/img/calendar-regular.png'
    const iconImageBytes = await fetch(icon).then((res) => res.arrayBuffer());
    const iconImage = await pdfDoc.embedPng(iconImageBytes);
    const icon2 = 'https://pruebasaeva.rf.gd/img/clock-regular.png'
    const iconImageBytes2 = await fetch(icon2).then((res) => res.arrayBuffer());
    const iconImage2 = await pdfDoc.embedPng(iconImageBytes2);

    // Petición con proxy 
    //const proxyURL = 'https://cors-anywhere.herokuapp.com/';
    //const finalURL = proxyURL + png1;

    const pngImageBytes = await fetch(png1).then((res) => res.arrayBuffer())
    const pngImageBytes2 = await fetch(png2).then((res) => res.arrayBuffer())
    const pngImageBytes3 = await fetch(png3).then((res) => res.arrayBuffer())
    const pngImageBytes4 = await fetch(png4).then((res) => res.arrayBuffer())
    const pngImage1 = await pdfDoc.embedPng(pngImageBytes)
    const pngImage2 = await pdfDoc.embedPng(pngImageBytes2)
    const pngImage3 = await pdfDoc.embedPng(pngImageBytes3)
    const pngImage4 = await pdfDoc.embedPng(pngImageBytes4)

    const pngImageQr = await pdfDoc.embedPng(image);

    const imageWidth = pngImage1.width;
    const imageHeight = pngImage1.height;
    const imageWidth2 = pngImage2.width;
    const imageHeight2 = pngImage2.height;
    const imageWidth3 = pngImage3.width;
    const imageHeight3 = pngImage3.height;
    const imageWidth4 = pngImage4.width;
    const imageHeight4 = pngImage4.height;

    const helveticaFont = await pdfDoc.embedFont(StandardFonts.Helvetica)
    const helveticaBoldFont = await pdfDoc.embedFont(StandardFonts.HelveticaBold)

    // Definir tipo de hoja (carta)
    const letterSize = PageSizes.Letter;

    // Agragar una pag al pdf con el tipo de hoja
    const page = pdfDoc.addPage(letterSize);

    // Obtener ancho y largo de la pagina
    const { width, height } = page.getSize()

    // Definir las propiedades de las líneas punteadas
    const lineWidth = 1;
    const lineColor = PDFLib.rgb(0, 0, 0); // Color negro
    const dotSize = 5; // Tamaño de los puntos
    const dotSpacing = 3; // Espacio entre los puntos

    // Dibujar línea punteada horizontalmente en el centro de la página
    for (let x = 0; x < width; x += dotSize + dotSpacing) {
        page.drawLine({
            start: { x, y: height / 2 },
            end: { x: x + dotSize, y: height / 2 },
            thickness: lineWidth,
            color: lineColor,
        });
    }

    // Dibujar línea punteada verticalmente en el centro de la página
    for (let y = 0; y < height; y += dotSize + dotSpacing) {
        page.drawLine({
            start: { x: width / 2, y },
            end: { x: width / 2, y: y + dotSize },
            thickness: lineWidth,
            color: lineColor,
        });
    }

    // Draw a string of text toward the top of the page
    const fontSize = 14.3
    page.drawText('FERIA AEROESPACIAL\nMÉXICO 2025', {
        x: 108,
        y: 638,
        size: fontSize,
        font: helveticaFont,
        color: rgb(0, 0, 0),
    })

    page.drawText('Base Aérea Militar No. 1\n55640 Zumpango de Ocampo, Méx.', {
        x: 108,
        y: 590,
        size: 11,
        font: helveticaFont,
        color: rgb(0, 0, 0),
    })

    page.drawText('Organización: FAMEX 2025', {
        x: 145,
        y: 500,
        size: 11,
        font: helveticaFont,
        color: rgb(0, 0, 0),
    })

    page.drawText('Importe: $800.00\nGastos:  $122.00', {
        x: 205,
        y: 480,
        size: 10,
        font: helveticaFont,
        color: rgb(0, 0, 0),
    })

    page.drawText('Total: $000', {
        x: 183,
        y: 430,
        size: 13,
        font: helveticaFont,
        color: rgb(0, 0, 0),
    })

    page.drawText('ENTRADA 1 DE 1', {
        x: 495,
        y: 737,
        size: 8,
        font: helveticaFont,
        color: rgb(0, 0, 0),
    })

    page.drawText('23/06/2025 - 25/06/2025\n9:00 AM', {
        x: 348,
        y: 705,
        size: 9.5,
        font: helveticaFont,
        color: rgb(0, 0, 0),
    })

    page.drawImage(iconImage, {
        x: 330, // Coordenada X de la imagen
        y: 704, // Coordenada Y de la imagen
        width: 10, // Ancho de la imagen
        height: 10, // Altura de la imagen
    });

    page.drawImage(iconImage2, {
        x: 330, // Coordenada X de la imagen
        y: 680, // Coordenada Y de la imagen
        width: 10, // Ancho de la imagen
        height: 10, // Altura de la imagen
    });

    page.drawText('Tipo Acceso\nNombre', {
        x: 330, // Coordenada X del texto
        y: 642,
        size: 10,
        font: helveticaFont,
        color: rgb(0, 0, 0),
    })

    page.drawText(`VISITOR\n${nombre} ${apellidos}`, {
        x: 393,
        y: 642,
        size: 10,
        font: helveticaBoldFont,
        color: rgb(0, 0, 0),
    })

    // Insertar el código QR en la página del PDF
    const rectX = 398;
    const rectY = 443;
    page.drawImage(pngImageQr, {
        x: rectX,
        y: rectY,
        width: 130,
        height: 130,
    });

    page.drawImage(pngImage1, {
        x: 0, // Coordenada X de la imagen
        y: 400, // Coordenada Y de la imagen
        width: imageWidth / 1.8, // Ancho de la imagen
        height: imageHeight / 1.8, // Altura de la imagen
    });

    page.drawImage(pngImage2, {
        x: 35, // Coordenada X de la imagen
        y: 693, // Coordenada Y de la imagen
        width: imageWidth2 / 3.9, // Ancho de la imagen
        height: imageHeight2 / 3.9, // Altura de la imagen
    });

    page.drawImage(pngImage3, {
        x: 8, // Coordenada X de la imagen
        y: 20, // Coordenada Y de la imagen
        width: imageWidth3 / 2, // Ancho de la imagen
        height: imageHeight3 / 2, // Altura de la imagen
    });

    page.drawImage(pngImage4, {
        x: 349, // Coordenada X de la imagen
        y: 46, // Coordenada Y de la imagen
        width: imageWidth4 / 2.2, // Ancho de la imagen
        height: imageHeight4 / 2.2, // Altura de la imagen
    });

    // Serializar el PDF a bytes (a Uint8Array)
    const pdfBytes = await pdfDoc.save();

    // Convertir el ArrayBuffer a Base64
    const pdfBase64 = arrayBufferToBase64(pdfBytes);

    Email.send({
        SecureToken: '3ee61365-fc69-4fc6-9356-e74f0a28eb6b', //add your token here
        Host: 'smtp.elasticemail.com',
        Username: 'chekotwo11@gmail.com',
        Password: '6E19FA9AD418F91F8492BE8FC54AE4BEC050',
        To: email,
        From: 'chekotwo11@gmail.com',
        Subject: 'Boleto de acceso FAMEX-2025',
        Body: `<div style='text-align: justify; padding: 3%; background-color: #fff;'>Estimado(a) <b>${nombre} ${apellidos}</b>,
        <br>Gracias por tu compra de boletos para la FAMEX 2025. ¡Estamos emocionados de tenerte como asistente en uno de los eventos aeroespaciales más importantes del año!
        <br>Si tienes alguna pregunta o necesitas asistencia adicional, no dudes en contactarnos. Estaremos encantados de ayudarte.
        <br>¡Esperamos que disfrutes de la FAMEX 2025 y que tengas una experiencia inolvidable llena de innovación y conocimiento en el campo aeroespacial!</div>`,
        Attachments: [
            {
                name: `${nombre} ${apellidos}.pdf`,
                data: pdfBase64
            }]
    }).then(
        appendAlert('<b>¡Atención!</b> Se le a enviado a su correo electronico su boleto con el cual se le permitirá el acceso a la feria, favor de revisar su carpeta de <b>spam</b> si es necesario.', 'info', 'fa-circle-info')
    );
}

// Función para convertir ArrayBuffer a Base64
function arrayBufferToBase64(buffer) {
    let binary = '';
    const bytes = new Uint8Array(buffer);
    const len = bytes.byteLength;
    for (let i = 0; i < len; i++) {
        binary += String.fromCharCode(bytes[i]);
    }
    return btoa(binary);
}

// Encriptar informacion a formato vCard
function vCard() {
    // Se encapsulan los valores del formulario en formato vCard
    var vCardText = `BEGIN:VCARD\n`
    vCardText += `VERSION:3.0\n`
    vCardText += `N:${apellidos};${nombre};;;\n`
    vCardText += `EMAIL;TYPE=work:${email}\n`
    vCardText += `END:VCARD`;
    return vCardText;
}