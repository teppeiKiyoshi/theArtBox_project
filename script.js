receive ="";
interval = 400;

$(document).ready(() => {
    $("#cart").click(() => {
        window.location.href = "cart.php";
    });
    autoSearch();
    $("#chat-container").hide();
});

function editDeets() {
    window.location.href = "editAccount.php";
}

function deleteCartProd(name) {
    Swal.fire({
        title: "Delete",
        text: "Are you sure you want to delete this item?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "deleteCartProd.php",
                method: "POST",
                data: {
                    name: name,
                },
                success: (data) => {
                    if (data == 1) {
                        Swal.fire({
                            text: "Deleted",
                            showConfirmButton: false,
                            timer: 1000,
                            position: "top"
                        });
                        loadCart();
                    }
                    else {
                        alert(data);
                    }
                }
            });
        }
    });
}

function deleteWish(name) {
    Swal.fire({
        title: "Attention!",
        text: "Are you sure you want to delete this from your wishlist?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "deleteWish.php",
                method: "POST",
                data: {
                    name: name,
                },
                success: (data) => {
                    if (data == 1) {
                        Swal.fire({
                            text: "Deleted",
                            showConfirmButton: false,
                            timer: 1000
                        });
                        getWishes();
                    }
                    else {
                        alert(data);
                    }
                }
            });
        }
    });
}

function buyNow() {
    Swal.fire({
        title: "Attention",
        text: "Are you sure you want to checkout this item/s?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "checkout.php",
                method: "POST",
                success: (data) => {
                    if (data == 1) {
                        Swal.fire({
                            title: "Successful!",
                            text: "Kindly wait for 3 business days to get your item shipped.",
                            showConfirmButton: false,
                            timer: 2000,
                            position: "top",
                            icon: "success"
                        });
                        loadCart();
                    }
                    else {
                        alert(data);
                    }
                }
            });
        }
    });
}

function verifyLogin(email_login, password_login) {
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText === "valid") {
                window.location.href = "index.php";
            } else {
                document.getElementById("errorMessage").innerHTML = xhr.responseText;
            }
        }
    };
    xhr.open("POST", "verifyLogin.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("user=" + email_login + "&pass=" + password_login);
}

function forgotPass(email_forgot, password_forgot) {
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText === "valid") {
                window.location.href = "index.php";
            } else {
                document.getElementById("forgotError").innerHTML = xhr.responseText;
            }
        }
    };
    xhr.open("POST", "forgotPass.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("user=" + email_forgot + "&pass=" + password_forgot);
}

function registerShow() {
    regDisp = document.getElementById("registerForm");
    loginDisp = document.getElementById("loginForm");

    if (regDisp.style.display == "none") {
        if (loginDisp.style.display == "block") {
            regDisp.style.display = "block";
            loginDisp.style.display = "none";
        }
    } else {
        regDisp.style.display = "none";
        loginDisp.style.display = "block";
    }
}

function forgotShow() {
    forgotDisp = document.getElementById("forgotForm");
    loginDisp = document.getElementById("loginForm");

    if (loginDisp.style.display == "block" && forgotDisp.style.display == "none") {
        forgotDisp.style.display = "block";
        loginDisp.style.display = "none";
    } else {
        forgotDisp.style.display = "none";
        loginDisp.style.display = "block";
    }
}

function confirmRegister(firstName, lastName, email_register, contact_register, address_register, password_register, confirm_password, capt, captInput) {
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText === "valid") {
                document.getElementById("registerForm").style.display = "none";
                document.getElementById("loginForm").style.display = "block";
                document.getElementById("errorMessageRegister").innerHTML = "Account successfully registered";
            } else {
                document.getElementById("errorMessageRegister").innerHTML = xhr.responseText;
            }
        }
    };
    xhr.open("POST", "confirmRegister.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("newFN=" + firstName + "&newLN=" + lastName + "&newEmail=" + email_register + "&newContact=" + contact_register + "&newAddress=" + address_register + "&newPass=" + password_register + "&confPass=" + confirm_password + "&captValue=" + capt + "&captUser=" + captInput);
}

function userProfile() {
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("userprofile").innerHTML = xhr.responseText;
        }
    };
    xhr.open("POST", "userProfile.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
}

function addToCart(id) {
    qty = $("#qty-" + id).val();
    $.ajax({
        url: "addToCart.php",
        method: "POST",
        data: {
            prodID: id,
            qty: qty,
        },
        success: (data) => {
            if (data == "valid") {
                Swal.fire({
                    title: "Successful!",
                    text: "Item successfully added to cart!",
                    showConfirmButton: false,
                    timer: 1000,
                    icon: "success"
                });
                getProduct();
            } else if (data == "invalid") {
                Swal.fire({
                    title: "Not Successful!",
                    text: "Sorry. There is not enough item quantity.",
                    showConfirmButton: false,
                    timer: 3000,
                    icon: "error"
                });
            } else {
                alert(data);
            }
        }
    });
}

function editDeets() {
    window.location.href = "editAccount.php";
}

function editUser() {
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("editAccountDisp").innerHTML = xhr.responseText;
        }
    };
    xhr.open("POST", "editUser.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
}

function updateAcc(uEmail, uFname, uLname, uCont, uAdrs, uDpic) {
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText === "valid") {
                document.getElementById("editMessage").innerHTML = "Account successfully updated!";
                window.location.href = "index.php";
            } else {
                document.getElementById("editMessage").innerHTML = xhr.responseText;
            }
        }
    };
    xhr.open("POST", "updateAcc.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("newEmail=" + uEmail + "&newFname=" + uFname + "&newLname=" + uLname + "&newCont=" + uCont + "&newAdrs=" + uAdrs + "&newDpic=" + uDpic);
}

function backToIndex() {
    window.location.href = "index.php";
}

function goToCart() {
    window.location.href = "cart.php";
}

function loadCart() {
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("cartDisplay").innerHTML = xhr.responseText;
        }
    };
    xhr.open("POST", "loadCart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
}

function getWishes() {
    $.ajax({
        url: "getWishes.php",
        method: "POST",
        success: (data) => {
            $("#wishDisplay").html(data);
        }
    })
}

function logout(){
    Swal.fire({
        title: "Logout",
        text: "Are you sure you want to logout?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "logout.php",
                method: "POST",
                success: (data) => {
                    if (data == 1) {
                        window.location.href = "login_register.php";
                    }
                    else {
                        alert(data);
                    }
                }
            });
        }
    });
}

function showMessage(email){
    clearInterval(interval);
    receive = email;
    showName(email);
    $("#chat-container").show();
    interval = setInterval(() => {
        $.ajax({
            url: "showMessage.php",
            method: "POST",
            data: {
                email: email
            },
            success: (data)=>{
                $('#chat-body').html(data);
            }
        })
    }, 1000);
}

function createMessage(){
    content = $('#chat-message').val();
    if (content!=null || content!=""){
        $.ajax({
            url: "sendMessage.php",
            method: "POST",
            data: {
                receiver: receive,
                content: content
            },
            success: (data)=>{
                $('#chat-message').val(null);
                if(data!="valid"){
                    alert(data);
                }
            }
        })
    }
}

function showName(email){
    $.ajax({
        url: "showName.php",
        method: "POST",
        data: {
            email: email
        },
        success: (data) => {
            $('#chat-header').html(data);
        }
    })
}

function closeMessage(){
    $("#chat-container").hide();
}