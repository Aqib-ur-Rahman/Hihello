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

    // My code to run since DOM is loaded and ready

});

// --------------------- Own methods ----------------------------
function confirmLogOut() {
    if (confirm('Are you sure you want to log out?')) {
        window.location.href = '/user-logout';
    }
}

document.getElementById('retrieve-btn').addEventListener('click', retrieveContacts);
const contentDiv = document.getElementById('contacts-div');

function retrieveContacts() {
    let xhttpReq = new XMLHttpRequest();

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

const dashboardNav = document.getElementById("dashboardNav");
const cardsNav = document.getElementById("cardsNav");
const contactsNav = document.getElementById("contactsNav");
const bookmarksNav = document.getElementById("bookmarksNav");
const helpNav = document.getElementById("helpNav");
const settingsNav = document.getElementById("settingsNav");

dashboardNav.addEventListener('click', dashboardClicked);
cardsNav.addEventListener('click', cardsNavClicked);
contactsNav.addEventListener('click', contactsNavClicked);
bookmarksNav.addEventListener('click', bookmarksNavClicked);
helpNav.addEventListener('click', helpNavClicked);
settingsNav.addEventListener('click', settingsNavClicked);

function dashboardClicked() {
    document.getElementById('main-content').innerHTML =
        "<h4>Welcome {{ session('name') }},</h4>\
        <button id=\"retrieve-btn\">Retrieve Contacts</button>\
        <div id=\"contacts-div\"></div>";
}

function cardsNavClicked() {
    const container = document.getElementById('main-content');
    const userId = container.getAttribute('data-user-id');

    container.innerHTML = `
        <div class="newcard-div" id="newcard-div">
            <img src="images/plus.png" height="40px" width="40px" class="newcard-img"></img>
            <p class="newcard-text">Add Card</p>
        </div>`;

    document.getElementById('newcard-div').addEventListener('click', function () {
        // alert("The new card is clicked.");
        window.location.href = "/create-card";
    });

    // Now loading saved cards using fetch
    var url = "/request-cards?user_id=" + userId;

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // console.log(data);

            const tableContainer = document.createElement('div');
            tableContainer.className = 'table-container';

            // // Append new card
            // const newCardContainer = document.createElement('div');
            // newCardContainer.className = 'table-column';
            // newCardContainer.appendChild(document.getElementById('newcard-div'));
            // tableContainer.appendChild(newCardContainer);

            // Append fetched cards
            data.forEach(card => {
                const cardContainer = document.createElement('div');
                cardContainer.className = 'table-column card';

                // Populate the cardContainer with data from the 'card' object
                const cardTitle = document.createElement('h3');
                cardTitle.textContent = card.fullname;
                cardContainer.appendChild(cardTitle);

                const cardEmail = document.createElement('p');
                cardEmail.textContent = card.email;
                cardContainer.appendChild(cardEmail);

                const cardContact = document.createElement('p');
                cardContact.textContent = card.contact_number;
                cardContainer.appendChild(cardContact);

                const cardOrg = document.createElement('p');
                cardOrg.textContent = card.organization_name;
                cardContainer.appendChild(cardOrg);

                // Add more elements as needed for other properties

                tableContainer.appendChild(cardContainer);
            });

            container.appendChild(tableContainer);
        })
        .catch(error => alert('Error fetching data:', error));


    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}


function contactsNavClicked() {
}

function bookmarksNavClicked() {
}

function helpNavClicked() {
}

function settingsNavClicked() {
}