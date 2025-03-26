$(document).ready(function () {
  // nav
  $(".header-wrap nav .depth1").on("mouseenter", function () {
    // $(this).addClass("on").siblings().removeClass("on");
    $("header .depth2-wrap").addClass("on");
    $(".nav-bg").fadeIn(200);
  });
  $(".header-wrap .nav-wrap").on("mouseleave", function () {
    // $(".header-wrap nav .depth1").removeClass("on");
    $("header .depth2-wrap").removeClass("on");
    $(".nav-bg").fadeOut(200);
  });

  // mobile sitemap
  $(".sitemap .menu .tit").click(function () {
    if (!$(this).hasClass("active")) {
      $(".sitemap .menu .tit").removeClass("active");
      $(".sitemap .menu ul").slideUp(200);
      $(this).addClass("active");
      $(this).siblings("ul").slideDown(200);
    } else {
      $(this).removeClass("active");
      $(this).siblings("ul").slideUp(200);
    }
  });

  // lang
  $(".utils .lang button").click(function () {
    $(this).toggleClass("active");
    $(this).next("ul").slideToggle(200);
  });

  // mobile breadcrumb
  $(".breadcrumb .loca button").click(function (event) {
    event.stopPropagation();
    if (!$(this).hasClass("on")) {
      $(".breadcrumb .loca button").removeClass("on");
      $(".breadcrumb .loca ul").slideUp(200);
      $(this).addClass("on");
      $(this).siblings("ul").slideDown(200);
    } else {
      $(this).removeClass("on");
      $(this).siblings("ul").slideUp(200);
    }
  });
  $(document).on("click", function () {
    $(".breadcrumb .loca button").removeClass("on");
    $(".breadcrumb .loca ul").slideUp(200);
  });
  $(".breadcrumb .loca").on("click", function (event) {
    event.stopPropagation();
  });
});

//goTop
$(function () {
  $(".go-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 400);
    return false;
  });
});

function showSitemap() {
  $("header .util-group .btnSitemap").toggleClass("on");
  $("body").toggleClass("freezing");
  $(".sitemap-wrap").toggleClass("show");
}
function closeSitemap() {
  $("body").removeClass("freezing");
  $(".sitemap-wrap").removeClass("show");
}

// select
document.addEventListener("DOMContentLoaded", () => {
  const selectWraps = document.querySelectorAll(".select-wrap");
  selectWraps.forEach((wrap) => {
    const selectButton = wrap.querySelector(".select");
    const optionList = wrap.querySelector("ul");
    const options = wrap.querySelectorAll(".option");

    selectButton.addEventListener("click", () => {
      const isVisible = optionList.style.display === "block";
      selectWraps.forEach((otherWrap) => {
        const otherButton = otherWrap.querySelector(".select");
        const otherOptionList = otherWrap.querySelector("ul");
        otherOptionList.style.display = "none";
        otherButton.classList.remove("active");
      });

      optionList.style.display = isVisible ? "none" : "block";
      selectButton.classList.toggle("active", !isVisible);
    });

    options.forEach((option) => {
      option.addEventListener("click", (e) => {
        selectButton.textContent = e.target.textContent;
        selectButton.classList.remove("unselected");
        optionList.style.display = "none";
        selectButton.classList.remove("active");
      });
    });
  });

  document.addEventListener("click", (e) => {
    if (!e.target.closest(".select-wrap")) {
      selectWraps.forEach((wrap) => {
        const selectButton = wrap.querySelector(".select");
        const optionList = wrap.querySelector("ul");
        optionList.style.display = "none";
        selectButton.classList.remove("active");
      });
    }
  });
});

// Modal
function closeModal() {
  document.querySelectorAll(".modal-wrap").forEach((modal) => {
    modal.classList.remove("show");
  });
  document.body.classList.remove("freezing");
}

function backModal(button) {
  const modal = button.closest(".modal-wrap");
  if (modal) {
    modal.classList.remove("show");
  }
  document.body.classList.remove("freezing");
}

function showModal(modalName) {
  document.body.classList.add("freezing");
  document.querySelectorAll(".modal-wrap").forEach((modal) => {
    modal.classList.remove("show");
  });

  const modalToShow = document.querySelector(`.modal-wrap[data-modal-name="${modalName}"]`);
  if (modalToShow) {
    modalToShow.classList.add("show");
  }
}

function addModal(modalName) {
  const modalToShow = document.querySelector(`.modal-wrap[data-modal-name="${modalName}"]`);
  if (modalToShow) {
    modalToShow.classList.add("show");
  }
}

// 계좌 노출 여부
document.addEventListener("DOMContentLoaded", function () {
  const cardRadio = document.getElementById("card");
  const accoutRadio = document.getElementById("accout");
  const bankAccountSection = document.getElementById("bankAccountSection");

  function toggleBankSection() {
    if (accoutRadio.checked) {
      bankAccountSection.style.display = "block";
    } else {
      bankAccountSection.style.display = "none";
    }
  }

  cardRadio.addEventListener("change", toggleBankSection);
  accoutRadio.addEventListener("change", toggleBankSection);

  // 페이지 로드 시 체크된 값 확인
  toggleBankSection();
});
