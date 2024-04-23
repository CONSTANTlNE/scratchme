function convertToWebP() {
    const inputElement = document.getElementById("imageInput");

    // თუ ფაილი არჩეული არაა
    if (inputElement.files.length === 0) {
        console.error("No file selected.");
        return;
    }

    const file = inputElement.files[0];
    const reader = new FileReader();

    reader.onload = function (event) {
        const image = new Image();
        image.onload = function () {
            const canvas = document.createElement("canvas");
            const ctx = canvas.getContext("2d");

            // Set canvas dimensions
            canvas.width = image.width;
            canvas.height = image.height;

            // Draw image on canvas
            ctx.drawImage(image, 0, 0, image.width, image.height);

            // Convert canvas to base64 string (WebP format)
            const base64WebP = canvas.toDataURL("image/webp",0.7);

            // Set the base64 string as the value of the hidden input field
            document.getElementById("convertedImage").value = base64WebP;

            // Submit the form
            // document.getElementById("existingForm").submit();
            console.log('conversion finished')
        };
        image.src = event.target.result;
    };

    reader.readAsDataURL(file);
}


function convertToWebP2() {
    const inputElement2 = document.getElementById("imageInput2");

    // თუ ფაილი არჩეული არაა
    if (inputElement2.files.length === 0) {
        console.error("No file selected.");
        return;
    }

    const file2 = inputElement2.files[0];
    const reader2 = new FileReader();

    reader2.onload = function (event) {
        const image2 = new Image();
        image2.onload = function () {
            const canvas2 = document.createElement("canvas");
            const ctx2 = canvas2.getContext("2d");

            // Set canvas dimensions
            canvas2.width = image2.width;
            canvas2.height = image2.height;

            // Draw image on canvas
            ctx2.drawImage(image2, 0, 0, image2.width, image2.height);

            // Convert canvas to base64 string (WebP format)
            const base64WebP2 = canvas2.toDataURL("image/webp",0.7);

            // Set the base64 string as the value of the hidden input field
            document.getElementById("convertedImage2").value = base64WebP2;

            // Submit the form
            // document.getElementById("existingForm").submit();
            console.log('conversion finished')
        };
        image2.src = event.target.result;
    };

    reader2.readAsDataURL(file2);
}

function convertToWebP3() {
    const inputElement3 = document.getElementById("imageInput3");

    // თუ ფაილი არჩეული არაა
    if (inputElement3.files.length === 0) {
        console.error("No file selected.");
        return;
    }

    const file3 = inputElement3.files[0];
    const reader3 = new FileReader();

    reader3.onload = function (event) {
        const image3 = new Image();
        image3.onload = function () {
            const canvas3 = document.createElement("canvas");
            const ctx3 = canvas3.getContext("2d");

            // Set canvas dimensions
            canvas3.width = image3.width;
            canvas3.height = image3.height;

            // Draw image on canvas
            ctx3.drawImage(image3, 0, 0, image3.width, image3.height);

            // Convert canvas to base64 string (WebP format)
            const base64WebP3 = canvas3.toDataURL("image/webp",0.7);

            // Set the base64 string as the value of the hidden input field
            document.getElementById("convertedImage3").value = base64WebP3;

            // Submit the form
            // document.getElementById("existingForm").submit();
            console.log('conversion finished')
        };
        image3.src = event.target.result;
    };

    reader3.readAsDataURL(file3);
}



function aboutwebp() {
    const inputElement = document.getElementById("main_img");

    // თუ ფაილი არჩეული არაა
    if (inputElement.files.length === 0) {
        console.error("No file selected.");
        return;
    }

    const file = inputElement.files[0];
    const reader = new FileReader();

    reader.onload = function (event) {
        const image = new Image();
        image.onload = function () {
            const canvas = document.createElement("canvas");
            const ctx = canvas.getContext("2d");

            // Set canvas dimensions
            canvas.width = image.width;
            canvas.height = image.height;

            // Draw image on canvas
            ctx.drawImage(image, 0, 0, image.width, image.height);

            // Convert canvas to base64 string (WebP format)
            const base64WebP = canvas.toDataURL("image/webp",0.7);

            // Set the base64 string as the value of the hidden input field
            document.getElementById("convertedImage").value = base64WebP;

            // Submit the form
            // document.getElementById("existingForm").submit();
            console.log('conversion finished')
        };
        image.src = event.target.result;
    };

    reader.readAsDataURL(file);
}


function aboutwebp2() {
    const inputElement = document.getElementById("secondary_img");

    // თუ ფაილი არჩეული არაა
    if (inputElement.files.length === 0) {
        console.error("No file selected.");
        return;
    }

    const file = inputElement.files[0];
    const reader = new FileReader();

    reader.onload = function (event) {
        const image = new Image();
        image.onload = function () {
            const canvas = document.createElement("canvas");
            const ctx = canvas.getContext("2d");

            // Set canvas dimensions
            canvas.width = image.width;
            canvas.height = image.height;

            // Draw image on canvas
            ctx.drawImage(image, 0, 0, image.width, image.height);

            // Convert canvas to base64 string (WebP format)
            const base64WebP = canvas.toDataURL("image/webp",0.7);

            // Set the base64 string as the value of the hidden input field
            document.getElementById("convertedImage2").value = base64WebP;

            // Submit the form
            // document.getElementById("existingForm").submit();
            console.log('conversion finished')
        };
        image.src = event.target.result;
    };

    reader.readAsDataURL(file);
}
