import Inputmask from "inputmask";
import validator from 'validator';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import './style.css';

// swiper slider scripts
var heroSwiper = new Swiper(".hero-swiper", {
    modules: [Navigation, Pagination],
    initialSlide: 0,
    spaceBetween: 50,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
});

var secondarySwiper = new Swiper(".secondary-slider", {
    modules: [Navigation, Pagination, Autoplay],
    initialSlide: 0,
    autoplay: {
      delay: 5000,
    },
    spaceBetween: 50,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
});

var init = false;
var testimonialsSwiper;
function swiperCard() {
  const swiperContainer = document.querySelector(".swiper-testimonials");
  if (window.innerWidth <= 1024) {
    if (!init) {
      init = true;
      testimonialsSwiper = new Swiper(".swiper-testimonials", {
        spaceBetween: 24,
      });
    }
  } else if (init) {
    testimonialsSwiper.destroy(true, true);
    init = false;
    swiperContainer.classList.remove("swiper-backface-hidden");
  }
}
swiperCard();
window.addEventListener("resize", swiperCard);

// menu
const menu = document.querySelector(".menu-items")
const menuButton = document.getElementById("menu-button")

menuButton.addEventListener("click", function() {
    menu.classList.toggle("menu-active")
})

// inputmask
const phoneField = document.getElementById("contact-phone");

var im = new Inputmask("+1 999-999-9999");
im.mask(phoneField);

// contact form email
const contactForm = document.querySelector(".get-in-touch form")

const formFields = document.querySelectorAll("#contact-name, #contact-phone, #contact-email");

formFields.forEach(function(field) {
  field.addEventListener("blur", function() {
    const errorElement = field.previousElementSibling;
    if (errorElement && errorElement.classList.contains("form-error")) {
      errorElement.remove();
    }
  });
});

contactForm.onsubmit = e => {
  e.preventDefault()

  document.querySelectorAll(".form-error").forEach(el => el.remove());

  const nameInput = contactForm.querySelector("#contact-name")
  const phoneInput = contactForm.querySelector("#contact-phone")
  const emailInput = contactForm.querySelector("#contact-email")
  const messageInput = contactForm.querySelector("#contact-message")

  let formValid = true;

  // validation
  if (validator.isEmpty(nameInput.value)) {
    nameInput.insertAdjacentHTML("beforebegin", '<p class="form-error">Please fill the name:</p>')
    formValid = false;
  }

  if (validator.isEmpty(phoneInput.value)) {
    phoneInput.insertAdjacentHTML("beforebegin", '<p class="form-error">Please fill the phone:</p>')
    formValid = false;
  }

  if (validator.isEmpty(emailInput.value)) {
    emailInput.insertAdjacentHTML("beforebegin", '<p class="form-error">Please fill the email:</p>')
    formValid = false;
  } else if (!(validator.isEmail(emailInput.value))) {
    emailInput.insertAdjacentHTML("beforebegin", '<p class="form-error">Email format is incorrect:</p>')
    formValid = false;
  }

  if (!formValid) {
    return;
  }

  fetch(customData.themePath + '/dist/backend/email.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    mode: 'same-origin',
    credentials: 'same-origin',
    body: JSON.stringify({
      to: emailInput.value,
      subject: "Goodlyfe Gyms Contact Form",
      message: messageInput.value,
      name: nameInput.value,
      phone: phoneInput.value,
    })
  }).then(json => json.json()).then(result => {
    console.log(result)
    if (result.success) {
      window.location.href = "thank-you.html";
    }
  })
}