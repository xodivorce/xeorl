const form = document.querySelector(".shorten-form"),
    urlInput = document.querySelector("#url-input"),
    shortenBtn = document.querySelector("#shorten-btn"),
    linksList = document.querySelector("#links-list");

shortenBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "core/url-controll.php", true);
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let data = xhr.response;
            if (data.length <= 5) {
                let domain = "xeorl.buzz/";
                let shortenURL = domain + data;

                let newRow = `
                    <li>
                        <div class="link-icon"><img src="assets/images/url.png" class="logo-img"></div>
                        <div class="link-info">
                            <span class="short-link">${shortenURL}</span>
                            <span class="long-link">${urlInput.value}</span>
                        </div>
                        <button class="copy-btn"><img src="assets/images/copy.png"></button>
                        <button class="delete-btn"><img src="assets/images/delete.png"></button>
                    </li>
                `;
                linksList.insertAdjacentHTML('afterbegin', newRow);
                urlInput.value = ""; // Clear the input field
                location.reload(); // Reload the page after shortening
            } else {
                alert(data);
            }
        }
    };
    let formData = new FormData();
    formData.append("full_url", urlInput.value);
    xhr.send(formData);
};

// Handle copy button clicks
document.addEventListener('click', function(e) {
    if (e.target.closest('.copy-btn')) {
        const linkInfo = e.target.closest('li').querySelector('.short-link').textContent;
        navigator.clipboard.writeText(linkInfo).catch(err => {
            console.error('Failed to copy text: ', err);
        });
    }
});

// Handle delete button clicks
 /* 
document.addEventListener('click', function(e) {
    if (e.target.closest('.delete-btn')) {
        const linkItem = e.target.closest("li");
        const shortenURL = linkItem.querySelector(".short-link").textContent;

        let xhr = new XMLHttpRequest();
        xhr.open("GET", `core/delete.php?id=${shortenURL.split('/').pop()}`, true);
        xhr.onload = () => {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText === "success") {
                    linkItem.remove();

                    // Check if the list is empty after deletion
                    if (linksList.children.length === 0) {
                        location.reload(); // Reload the page if no links are left
                    }
                } else {
                    alert("Failed to delete the URL.");
                }
            }
        };
        xhr.send();
    }
    
});*/ 

      // Handle members only delete button clicks!!
    document.querySelectorAll(".delete-btn").forEach((deleteBtn) => {
        deleteBtn.addEventListener("click", function () {
            // Alert instead of delete functionality
            alert("This feature is available for members only.");
        });
    });  

