document.addEventListener("DOMContentLoaded", function (event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                // show navbar
                nav.classList.toggle('show')
                // change icon
                toggle.classList.toggle('bx-x')
                // add padding to body
                bodypd.classList.toggle('body-pd')
                // add padding to header
                headerpd.classList.toggle('body-pd')
            })

            // Trigger the click event to open the navbar by default
            toggle.click();
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink))

    // Your code to run since DOM is loaded and ready
});

// Own methods
function confirmLogOut() {
    if (confirm('Are you sure you want to log out?')) {
        window.location.href = '/user-logout';
    }
}

document.getElementById('retrieve-btn').addEventListener('click', retrieveContacts);
const contentDiv = document.getElementById('contacts-div');

function retrieveContacts() {
    // Make an AJAX request to your server endpoint
    var xhttpReq = new XMLHttpRequest();

    var url = "/retrieve-contacts";
    xhttpReq.open('GET', url);
    xhttpReq.send();
    alert("Request sent. Waiting for response from server.");

    xhttpReq.onreadystatechange = function () {
        if (xhttpReq.readyState == 4 && xhttpReq.status == 200) {
            // const JSONResponse = JSON.parse(xhttpReq.responseText);

            // for (let item in JSONResponse) {
            //     contentDiv.innerHTML += JSONResponse[item].name + "<br>";
            //     contentDiv.innerHTML += JSONResponse[item].email + "<hr>";
            //     console.log(JSONResponse[item].name);
            //     console.log(JSONResponse[item].email);
            //     console.log("----------------");
            // }

            // alert('Success: ' + JSONResponse);

            contentDiv.innerText = xhttpReq.responseText;
            
        }
        else {
            // alert('Error Response: \nStatus: ' + xhttpReq.status + "\nStatusText: " + xhttpReq.statusText + "\nReadyState: " + xhttpReq.readyState);
        }
    };
}