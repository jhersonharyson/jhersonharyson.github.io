const detectMob = () => {
  if (
    navigator.userAgent.match(/Android/i) ||
    navigator.userAgent.match(/webOS/i) ||
    navigator.userAgent.match(/iPhone/i) ||
    navigator.userAgent.match(/iPad/i) ||
    navigator.userAgent.match(/iPod/i) ||
    navigator.userAgent.match(/BlackBerry/i) ||
    navigator.userAgent.match(/Windows Phone/i)
  ) {
    return true;
  } else {
    return false;
  }
};

const isInViewport = function(elem) {
  var bounding = elem.getBoundingClientRect();
  const onHeight =
    bounding.top >= 0 &&
    bounding.left >= 0 &&
    bounding.bottom <=
      (window.innerHeight || document.documentElement.clientHeight);
  const onWidth =
    bounding.right <=
    (window.innerWidth || document.documentElement.clientWidth);

  // console.log(onHeight && onWidth, 1);
  // console.log(onHeight && !onWidth, 2);
  // console.log(!onHeight && onWidth, 3);

  if (onHeight && onWidth) return true;
  if (onHeight && !onWidth) return "";
  if (!onHeight && onWidth) return false;
  return 0;
};

window.onscroll = () => {
  const demo = document.getElementsByClassName("demo")[0];
  if (isInViewport(demo)) {
    document.querySelectorAll("div.demo > div")[0].style.transform =
      "translateX(0px)";
    document.querySelectorAll("div.demo > div")[1].style.transform =
      "translateX(0px)";
  } else {
    // document.querySelectorAll("div.demo > div")[0].style.transform =
    //   "translateX(100vw)";
    // document.querySelectorAll("div.demo > div")[1].style.transform =
    //   "translateX(-100vw)";
  }
  let mobile = document.getElementsByClassName("mobile")[0];
  let credCard = document.getElementsByClassName("cred-card")[0];
  const projectMobile = document.getElementById("project-mobile");
  console.log(isInViewport(projectMobile));
  if (isInViewport(projectMobile)) {
    if (detectMob()) {
      mobile.style.animation =
        "resize_shake_mobile 2.5s ease-in-out forwards";
      credCard.style.animation =
        "card_mobile 0.5s ease-in forwards 1.5s, card_fade_in 0.5s ease-in 1s forwards";
    } else {
      mobile.style.animation = "resize_shake 2.5s ease-in-out forwards";
      credCard.style.animation =
        "card 0.5s ease-in forwards 1.5s, card_fade_in 0.5s ease-in 1s forwards";
    }
  }
};



const configureComponentsSize = () => {
  if (detectMob()) {
    const mobile = document.getElementById("mobile");
    const desktop = document.getElementById("desktop");

    const phone = document.getElementsByClassName("mobile")[0];
    const credCard = document.getElementsByClassName("cred-card")[0];

    mobile.width = 100;
    desktop.width = window.innerWidth - 100;
    phone.width = 1000;
    credCard.width = window.innerWidth - 100;
    // phone.width = window.innerWidth - 300;
    // credCard.width = window.innerWidth - 100;
  }
};
setTimeout(() => {
  if (detectMob()) {
    const mobile = document.getElementById("mobile");
    const desktop = document.getElementById("desktop");
    mobile.width = window.innerWidth - 300;
    desktop.width = window.innerWidth - 300;
  }
}, 1);

window.onload = configureComponentsSize
window.onresize = configureComponentsSize
