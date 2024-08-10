document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("form").onsubmit = function() {
        // Validate text fields (menuname, ingredients)
        const textFields = ['menuname', 'ingredients'];
        for (let field of textFields) {
            const value = document.getElementById(field).value.trim();
            if (!value || !isNaN(value)) {
                alert(`${field.charAt(0).toUpperCase() + field.slice(1)} must be a valid text.`);
                return false;
            }
        }

        // Validate select fields (category, mode)
        const selectFields = ['category', 'mode'];
        for (let field of selectFields) {
            const value = document.getElementById(field).value;
            if (value === "") {
                alert(`Please select a valid ${field}.`);
                return false;
            }
        }

        // Validate price field
        const price = document.getElementById('price').value;
        if (isNaN(price) || price <= 0) {
            alert('Price must be a positive number.');
            return false;
        }

        // Validate image upload
        const image = document.getElementById('imageurl').files[0];
        if (!image) {
            alert('Please upload an image.');
            return false;
        }

        const validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        const fileExtension = image.name.split('.').pop().toLowerCase();
        if (!validExtensions.includes(fileExtension)) {
            alert('Invalid image format. Please upload a JPG, JPEG, PNG, or GIF file.');
            return false;
        }

        // All validations passed
        return true;
    };
});
