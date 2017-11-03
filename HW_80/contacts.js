(function () {
    "use strict";

    var contactTable = get("contactTable"),
        contacts = [];
    //var theForm = get(theForm);

    function get(id) {
        return document.getElementById(id);
    }

    function addContact() {
        var contact = {
            firstName: get("firstName").value,
            lastName: get("lastName").value,
            email: get("email").value,
            phone:get("phone").value,
        };

        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.deleteRow(1);
        }

        var row = contactTable.insertRow();
        var firstNameCell = row.insertCell();
        var lastNameCell = row.insertCell();
        var emailCell = row.insertCell();
        var phoneCell = row.insertCell();
        //var fillFirstName = get("firstName").value;

        firstNameCell.innerHTML = contact.firstName;
        lastNameCell.innerHTML = contact.lastName;
        emailCell.innerHTML =contact.email;
        phoneCell.innerHTML = contact.phone;
    }

    get("add").addEventListener("click", addContact);
}());