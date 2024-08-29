const form = document.querySelector(".wrapper form"),
    fullURL = form.querySelector("input"),
    shortenBtn = form.querySelector("form button"),
    urlsArea = document.querySelector(".urls-area");

form.onsubmit = (e) => {
    e.preventDefault();
};

shortenBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/url-controll.php", true);
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let data = xhr.response;
            if (data.length <= 5) {
                // Example of setting the shortened URL directly to the list
                let domain = "localhost/url/";
                let shortenURL = domain + data;

                // Create a new row for the URL and append it to the list
                let newRow = `
                    <div class="data">
                        <li><a href="${shortenURL}" target="_blank">${shortenURL}</a></li>
                        <li>${fullURL.value}</li>
                        <li>0</li>
                        <li><a href="php/delete.php?id=${data}">Delete</a></li>
                    </div>
                `;
                urlsArea.insertAdjacentHTML('afterbegin', newRow);
            } else {
                alert(data);
            }
        }
    };
    let formData = new FormData(form);
    xhr.send(formData);
};
