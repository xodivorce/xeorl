const form = document.querySelector(".shorten-form"),
    urlInput = document.querySelector("#url-input"),
    shortenBtn = document.querySelector("#shorten-btn"),
    linksList = document.querySelector("#links-list");

// Clear the list and show the "You don't have any shortened links" message
function resetLinksList() {
    linksList.innerHTML = `
        <li id="default-message">
            <div class="link-icon"><img src="assets/images/url.png" class="url-img"></div>
            <div class="link-info">
                <span class="short-link">xeorl.buzz/*****</span>
                <span class="long-link">You don't have any shortened links</span>
            </div>
            <button class="copy-btn"><img src="assets/images/copy.png"></button>
            <button class="delete-btn"><img src="assets/images/delete.png"></button>
        </li>
    `;
}

// Check session storage for existing links on page load
document.addEventListener("DOMContentLoaded", () => {
    const savedLinks = sessionStorage.getItem("shortenedLinks");
    if (savedLinks) {
        linksList.innerHTML = savedLinks;
    } else {
        resetLinksList();
    }
});

shortenBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "core/url-controll.php", true);
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let data = xhr.response;
            if (data.length <= 5) {
                //This is your domain name 
                const domain = "xeorl.buzz/";
                let shortenURL = domain + data;

                // Remove the default message if it exists
                const defaultMessage = document.getElementById("default-message");
                if (defaultMessage) {
                    defaultMessage.remove();
                }

                // Add the new link to the list
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

                // Append the new link to the list and update session storage
                linksList.insertAdjacentHTML('afterbegin', newRow);
                sessionStorage.setItem("shortenedLinks", linksList.innerHTML);

                // Clear the input field
                urlInput.value = ""; 
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

// Handle members only delete button clicks!!
document.addEventListener('click', function(e) {
    if (e.target.closest('.delete-btn')) {
        alert("This feature is available for members only.");
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


