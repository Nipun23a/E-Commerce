
function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

num = 1;

function gotoTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function plus(price) {
    var qty = document.getElementById("qty");
    var totqty = document.getElementById("totqty");
    var tot = document.getElementById("totprice");
    num = num + 1;
    qty.innerHTML = num;
    totqty.value = num;
    tot.innerHTML = "Rs. " + price * num + ".00";
}

function mines(price) {
    if (num == 1) {
        qty.innerHTML = "1";
    } else {
        var qty = document.getElementById("qty");
        var totqty = document.getElementById("totqty");
        num = num - 1;
        qty.innerHTML = num;
        totqty.value = num;

    }
    var tot = document.getElementById("totprice");
    tot.innerHTML = "Rs. " + price / num + ".00";
}

function setimg1() {
    var img = document.getElementById("img1").src;
    var mainImg = document.getElementById("mainImg");
    mainImg.src = img;
}

function setimg2() {
    var img = document.getElementById("img2").src;
    var mainImg = document.getElementById("mainImg");
    mainImg.src = img;
}

function setimg3() {
    var img = document.getElementById("img3").src;
    var mainImg = document.getElementById("mainImg");
    mainImg.src = img;
}

var bmodal;

function setStatus() {
    var modal = document.getElementById("ActionModal");
    bmodal = new bootstrap.Modal(modal);
    bmodal.show();
}


var bcatagoryModal;

function addNewCategory() {
    var modal = document.getElementById("addCategoryModal");
    bcatagoryModal = new bootstrap.Modal(modal);
    bcatagoryModal.show();
}
var dcatagoryModal;

function deleteCategory(id) {
    var modal = document.getElementById("deleteCategoryModal" + id);
    dcatagoryModal = new bootstrap.Modal(modal);
    dcatagoryModal.show();
}

var bimgModal;

function viewPImage(pname, img) {
    var modal = document.getElementById("ImageModal");
    var title = document.getElementById("ptitle");
    var modalimg = document.getElementById("model_img");
    bimgModal = new bootstrap.Modal(modal);
    title.innerHTML = pname;
    modalimg.src = img;
    bimgModal.show();
}


var badminSignModal;

function adminSignInCodeSendModalView() {

    var modal = document.getElementById("adminSignInModal");
    badminSignModal = new bootstrap.Modal(modal);
    badminSignModal.show();
}

function adminSignProcess() {

    var email = document.getElementById("email").value;
    var vcode = document.getElementById("vcode").value;

    var form = new FormData();
    form.append("email", email);
    form.append("vcode", vcode);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                alert("Sign In Success");
                window.location = "adminPanel.php";
            } else if (text == "wrong") {
                alert("The verification code is wrong.");
            } 
            alert(text);
        }
    }
    request.open("POST", "adminSignInProcess.php", true);
    request.send(form);
}

function adminSignInCodeSend() {
    var email = document.getElementById("email").value;

    var form = new FormData();
    form.append("email", email);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == 1) {
                alert("Verification Code has sent to your email. Please check inbox.");
                adminSignInCodeSendModalView();
            } else {
                alert(text);
            }
        }
    }
    request.open("POST", "adminSignInCodeSendProcess.php", true);
    request.send(form);
}

var trashModal;

function moveSellTransaction(id) {

    var modal = document.getElementById("trashModel" + id);
    trashModal = new bootstrap.Modal(modal);
    trashModal.show();
}

function createNewAccount() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var pw = document.getElementById("pw").value;
    var cpw = document.getElementById("cpw").value;
    var mobile = document.getElementById("mobile").value;
    var gender = document.getElementById("gender").value;



    var form = new FormData();
    form.append("f", fname);
    form.append("l", lname);
    form.append("e", email);
    form.append("pw", pw);
    form.append("cpw", cpw);
    form.append("m", mobile);
    form.append("g", gender);




    var report = new XMLHttpRequest();

    report.onreadystatechange = function () {
        if (report.readyState == 4) {
            var text = report.responseText;
            if (text == "success") {
                alert("Account create successful.");
                changeView();
            } else {
                alert(text);
            }
        }
    }
    report.open("POST", "signUpProcess.php", true);
    report.send(form);

}

function signInCustomer() {
    var email = document.getElementById("femail").value;
    var pw = document.getElementById("fpw").value;
    var remMe = document.getElementById("rememberMe").checked;

    var form = new FormData();
    form.append("em", email);
    form.append("pw", pw);
    form.append("rem", remMe);

    var report = new XMLHttpRequest();

    report.onreadystatechange = function () {
        if (report.readyState == 4) {
            var text = report.responseText;
            if (text == "success") {
                window.location = "home.php";
            } else {
                alert(text);
            }
        }
    }

    report.open("POST", "signInProcess.php", true);
    report.send(form);


}

function signOutUser() {


    var report = new XMLHttpRequest();

    report.onreadystatechange = function () {
        if (report.readyState == 4) {
            var text = report.responseText;
            if (text == "success") {
                alert("Sign Out success.")
                window.location = "home.php";
            } else {
                alert(text);
            }
        }
    }
    report.open("GET", "signOutProcess.php", true);
    report.send();
}
function signOutAdmin() {


    var report = new XMLHttpRequest();

    report.onreadystatechange = function () {
        if (report.readyState == 4) {
            var text = report.responseText;
            if (text == "success") {
                alert("Sign Out success.")
                window.location = "adminSignin.php";
            } else {
                alert(text);
            }
        }
    }
    report.open("GET", "signOutProcessAdmin.php", true);
    report.send();
}

var fpwModal;

function frogetPassword() {

    var frogetem = document.getElementById("femail");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 1) {
                alert("Verification Code has sent to your email. Please check inbox.");
                var modal = document.getElementById("fpwmodal");
                fpwModal = new bootstrap.Modal(modal);
                fpwModal.show();
            } else {
                alert(text);
            }

        }
    }

    r.open("GET", "frogetPasswordProcess.php?e=" + frogetem.value, true);
    r.send();

}

function resetPassword() {

    var frogetem = document.getElementById("femail");
    var verify_code = document.getElementById("verify_code");
    var new_pw = document.getElementById("new_pw");
    var new_cpw = document.getElementById("new_cpw");


    var r = new XMLHttpRequest();

    var form = new FormData();
    form.append("em", frogetem.value);
    form.append("vc", verify_code.value);
    form.append("newpw", new_pw.value);
    form.append("newcpw", new_cpw.value);

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var rt = r.responseText

            if (rt == "success") {
                alert("Password reset successful.");
                fpwModal.hide();
            } else {
                alert(rt);
            }

        }
    }

    r.open("POST", "resetPasswordProcess.php", true);
    r.send(form);
}

function saveProduct() {
    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var model = document.getElementById("model");

    var condition = 0;

    var brandnew = document.getElementById("brandnew");
    var used = document.getElementById("used");

    if (brandnew.checked == true) {
        condition = document.getElementById("brandnew");
    } else if (used.checked == true) {
        condition = document.getElementById("used");
    }

    var clr = 0;

    var clr0 = document.getElementById("clr0");
    var clr1 = document.getElementById("clr1");
    var clr2 = document.getElementById("clr2");
    var clr3 = document.getElementById("clr3");
    var clr4 = document.getElementById("clr4");
    if (clr0.checked == true) {
        clr = document.getElementById("clr0");
    } else if (clr1.checked == true) {
        clr = document.getElementById("clr1");
    } else if (clr2.checked == true) {
        clr = document.getElementById("clr2");
    } else if (clr3.checked == true) {
        clr = document.getElementById("clr3");
    } else if (clr4.checked == true) {
        clr = document.getElementById("clr4");
    }

    var ptitle = document.getElementById("ptitle");
    var cost = document.getElementById("cost");
    var dfees = document.getElementById("dfees");
    var qty = document.getElementById("qty");
    var description = document.getElementById("description");
    var r = new XMLHttpRequest();

    var form = new FormData();
    form.append("category", category.value);
    form.append("brand", brand.value);
    form.append("model", model.value);
    form.append("condition", condition.value);
    form.append("color", clr.value);
    form.append("title", ptitle.value);
    form.append("cost", cost.value);
    form.append("dfees", dfees.value);
    form.append("qty", qty.value);
    form.append("description", description.value);

    var image = document.getElementById("imageuploader");

    for (var x = 0; x < image.files.length; x++) {
        form.append("img[]", image.files[x]);
    }

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var rt = r.responseText;
            if (rt == "success") {
                alert("Product has been added.");
                window.location = "manageProducts.php";
            } else {
                alert(rt);
            }
        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(form);
}







function loadImages() {
    var image = document.getElementById("imageuploader");

    image.onchange = function () {
        var image_count = image.files.length;

        for (var x = 0; x < image_count; x++) {
            var file = this.files[x];
            var url = window.URL.createObjectURL(file);
            document.getElementById("preview" + x).src = url;
        }
    }
}

function saveProfile() {

    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var addl1 = document.getElementById("add1").value;
    var addl2 = document.getElementById("add2").value;
    var city = document.getElementById("city").value;
    var province = document.getElementById("province").value;
    var district = document.getElementById("district").value;
    var gender = document.getElementById("gender").value;
    var postalcode = document.getElementById("postalcode").value;


    var form = new FormData();
    form.append("f", fname);
    form.append("l", lname);
    form.append("e", email);
    form.append("m", mobile);
    form.append("a1", addl1);
    form.append("a2", addl2);
    form.append("c", city);
    form.append("p", province);
    form.append("d", district);
    form.append("g", gender);
    form.append("pcode", postalcode);
    formData.append('image', document.getElementById('image-upload').files[0]);




    var report = new XMLHttpRequest();

    report.onreadystatechange = function () {
        if (report.readyState == 4) {
            var text = report.responseText;
            if (text == "success") {
                alert("Account update successful.");
                window.location.reload();
            } else {
                alert(text);
            }
        }
    }
    report.open("POST", "updateProfile.php", true);
    report.send(form);

}

function addnewcategoryProcess() {
    var category = document.getElementById("category");

    var r = new XMLHttpRequest();

    var form = new FormData();
    form.append("category", category.value);

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var txt = r.responseText;
            if (txt == "New Category added successful.") {
                alert(txt);
                document.location.reload();
            } else {
                alert(txt);
            }
        }
    }

    r.open("POST", "addnewcategoryprocess.php", true);
    r.send(form);
}

function deleteCategoryItem(id,proceedPage,serverMessage) {
    var r = new XMLHttpRequest();

    var form = new FormData();

    form.append("cid", id);

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var txt = r.responseText;
            if (txt == "success") {
                alert(serverMessage);
                document.location.reload();
            } else {
                alert(txt);
            }
        }
    }
    r.open("POST", proceedPage, true);
    r.send(form);

}

function updateProduct(productId) {
    window.location.href = 'updateProduct.php?id=' + productId;
}


var bpAcyModal;
var managePId;

function productStatusChangeModal(id) {
    managePId = id;
    var modal = document.getElementById("ProductActionModal" + id);
    bpAcyModal = new bootstrap.Modal(modal);
    bpAcyModal.show();
}

function productStatusChange(pid, status) {

    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("pid", pid);

    if (status == "1") {
        f.append("state", "0")
    } else {
        f.append("state", "1")
    }
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var txt = r.responseText;
            alert(txt);
            document.location.reload();
        }
    }
    r.open("POST", "manageProductStatus.php", true);
    r.send(f);
}



function dfeesProcess() {
    var city = document.getElementById("city");
    var cityid = city.options[city.selectedIndex].value;

    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("cityid", cityid);
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var txt = r.responseText;

            var lbl = document.getElementById("dfeeslbl");
            lbl.innerHTML = "Rs. " + txt;

        }
    }
    r.open("POST", "dfeesProcess.php", true);
    r.send(f);
}

window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    var navbar = document.getElementById("header");
    var snav = document.getElementById("snav");
    var tbtn = document.getElementById("top-btn");


    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        tbtn.className = "d-block"
        snav.className = "d-block"
        navbar.className = "fixed-top"
    } else {
        navbar.style.backgroundColor = "white";
        snav.className = "d-none"
        tbtn.className = "d-none"
        navbar.className = "none"

    }

}

function goHome() {
    window.location = "home.php";
}

function goProfile() {
    window.location = "profile.php";
}

function goMyProducts() {
    window.location = "manageProducts.php";
}

function goPurchaseHistory() {
    window.location = "purchaseHistory.php";
}

function addToCart(pid) {
    var pqty = 1;
    pqty = document.getElementById("qty");


    var r = new XMLHttpRequest();

    var form = new FormData();
    form.append("pid", pid);

    if (pqty == null) {
        form.append("qty", "1");
    } else {
        form.append("qty", pqty.textContent);
    }

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var txt = r.responseText;
            if (txt == "success") {
                alert("Item added to cart.");
                window.location = "cart.php";
            } else {
                alert(txt);
            }
        }
    }

    r.open("POST", "addToCartProcess.php", true);
    r.send(form);

}

function productTotal(price, id) {
    var tot = 0;
    var lbltot = document.getElementById("cardtot" + id);
    var qty = document.getElementById("qty" + id);
    var totqty = document.getElementById("totqty" + id);

    if (qty.value <= 0) {
        qty.innerHTML = "1";
    } else {
        tot = price * qty.value;
        lbltot.innerHTML = "Rs. " + tot + ".00";
    }
    updateCartQty(qty.value, id);
}

function updateCartQty(qty, id) {
    if (qty < 1) {
        alert("Invalid Qantity");
        window.location.reload();
    } else {

        var r = new XMLHttpRequest();
        var f = new FormData();

        f.append("qty", qty);
        f.append("cid", id);

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var txt = r.responseText;
                if (txt == "success") {
                    window.location.reload();
                } else {
                    alert(txt);
                }
            }
        }

        r.open("POST", "updateCartQty.php", true);
        r.send(f);
    }
}

function removeFromCart(pid) {

    var r = new XMLHttpRequest();

    var form = new FormData();
    form.append("pid", pid);

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var txt = r.responseText;
            if (txt == "success") {
                alert("Item Removed.");
                window.location = "cart.php";
            }
        }
    }

    r.open("POST", "removeFromCarProcess.php", true);
    r.send(form);

}

var signAleart;

function alertShowing() {

    var modal = document.getElementById("signaleartbox");
    signAleart = new bootstrap.Modal(modal);
    signAleart.show();
}

function moveSellTransactionProcess(pid) {

    var r = new XMLHttpRequest();
    var f = new FormData();

    f.append("pid", pid);

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var txt = r.responseText;
            if (txt == "success") {
                window.location.reload();
            }
        }
    }

    r.open("POST", "sellTransactionRemoveProcess.php", true);
    r.send(f);
}

function removeFromWatchlist(id) {

    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("wid", id);

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var txt = r.responseText;
            if (txt == "success") {
                window.location.reload();
            } else {
                alert(txt);
            }
        }
    }

    r.open("POST", "removeFromWatchlistProcess.php", true);
    r.send(f);

}

function addtoWatchlist(id) {
    var r = new XMLHttpRequest();
    var f = new FormData();

    f.append("pid", id);

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var txt = r.responseText;
            if (txt == "success") {
                window.location = "watchlist.php";
            } else {
                alert(txt);
            }
        }
    }

    r.open("POST", "addToWatchListProcess.php", true);
    r.send(f);
}

function buyNow(amount, qty) {
    alert(amount);
    alert(qty);
}