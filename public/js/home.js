const body = document.getElementsByTagName("body");
const plate = document.getElementsByClassName("plate")[0];
const nav = document.getElementsByClassName("na");
const navArr = [0, 2, 4, 6, 8, 10];
const ddd = window.location.href;
console.log(ddd);
let params = window.location.search.substring("_token");

if (
    ddd === "http://127.0.0.1:8000/Client/error" ||
    ddd === "http://127.0.0.1:8000/contact/error"
) {
    window.scrollTo(1000, document.body.scrollHeight);
}
if (params !== "") {
    window.scrollTo({
        top: 1000,
        behavior: "smooth",
    });
}
const handleNavClick = (i) => {
    // console.log(para, "is clicked");
    // plate.style.offsetLeft = `${navArr[i]}px`;
    plate.classList.remove(
        "offset-0",
        "offset-2",
        "offset-4",
        "offset-6",
        "offset-8",
        "offset-10"
    );
    plate.classList.add(`offset-${navArr[i]}`);
    console.log(navArr[i]);
};
switch (ddd) {
    // case "http://127.0.0.1:8000/":
    case "http://127.0.0.1:8000/Client":
        console.log("home");
        handleNavClick(0);
        break;
    case "http://127.0.0.1:8000/Client/error":
        console.log("home");
        handleNavClick(0);
        break;
    case "http://127.0.0.1:8000/about":
        console.log("about");
        handleNavClick(1);
        break;
    case "http://127.0.0.1:8000/contact":
        console.log("contact");
        handleNavClick(4);
        break;
    case "http://127.0.0.1:8000/contact/error":
        console.log("contact");
        handleNavClick(4);
        break;
    case "http://127.0.0.1:8000/services":
        console.log("services");
        handleNavClick(5);
        break;
    case "http://127.0.0.1:8000/blog":
        console.log("blog");
        handleNavClick(3);
        break;
    case "http://127.0.0.1:8000/Client/key":
        console.log("home");
        handleNavClick(0);
    default:
        handleNavClick(2);
        break;
}

// nav[0].onclick = function () {
//     handleNavClick("home");
// };
for (let i = 0; i < 6; i++) {
    console.log(i);
    nav[i].onclick = function () {
        handleNavClick(i);
    };
}
let isMenu = false;
if (!isMenu) {
    document.getElementById("linksMenu").style.display = "none";
}
let menuBar = () => {
    isMenu = !isMenu;
    if (isMenu) {
        document.getElementById("nav1").classList.add("nav1");
        document.getElementById("nav2").classList.add("nav2");
        document.getElementById("nav3").classList.add("nav3");
        document.getElementById("linksMenu").style.display = "block";
    } else {
        document.getElementById("nav1").classList.remove("nav1");
        document.getElementById("nav2").classList.remove("nav2");
        document.getElementById("nav3").classList.remove("nav3");
        document.getElementById("linksMenu").style.display = "none";
    }
};
