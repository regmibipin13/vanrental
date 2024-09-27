
// Toggle mobile menu visibility
const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

menuBtn.addEventListener('click', () => {
  mobileMenu.classList.toggle('menu-open'); // Adds or removes the max-height with ease-in-out animation
});


//   Toggle Faqs
function toggleFAQ(faqItem) {
  const answer = faqItem.nextElementSibling;
  const icon = faqItem.querySelector('span');

  if (answer.classList.contains('hidden')) {
    answer.classList.remove('hidden');
    icon.innerHTML = '<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.5 12H6.5" stroke="#3F3F46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
  } else {
    answer.classList.add('hidden');
    icon.innerHTML = '<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 6V12M12.5 12V18M12.5 12H18.5M12.5 12H6.5" stroke="#3F3F46" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
  }
}


// Date unavailavle garne
const unavailableDates = [
  "2024-09-25",
  "2024-09-26",
  "2024-09-27"
];

// Initialize Flatpickr on both input fields
flatpickr("#pickup-date", {
  enableTime: true,
  dateFormat: "Y-m-d H:i",
  disable: unavailableDates
});

flatpickr("#dropoff-date", {
  enableTime: true,
  dateFormat: "Y-m-d H:i",
});


// Show dropdown function
function showLocationDropdown(type) {
  const dropdown = document.getElementById(`${type}-location-dropdown`);
  dropdown.classList.toggle('hidden');
}

// Hide dropdown when clicking outside
document.addEventListener('click', function (event) {
  const dropdowns = ['pickup', 'dropoff'].map(type => document.getElementById(`${type}-location-dropdown`));
  const inputs = ['pickup', 'dropoff'].map(type => document.getElementById(`${type}-location`));

  // Check if the click was outside of any input or dropdown
  if (!inputs.some(input => input.contains(event.target)) && !dropdowns.some(dropdown => dropdown.contains(event.target))) {
    dropdowns.forEach(dropdown => dropdown.classList.add('hidden'));
  }
});

// Select location function
function selectLocation(type, location) {
  const input = document.getElementById(`${type}-location`);
  input.value = location;
  document.getElementById(`${type}-location-dropdown`).classList.add('hidden');
}

//JS to toggle Dropdown
const languageDropdown = document.getElementById('language-dropdown');
const languageOptions = document.getElementById('language-options');

languageDropdown.addEventListener('click', function () {
  languageOptions.classList.toggle('hidden');
});

// Event listener to handle language selection (optional, if you want to update the selected flag dynamically)
languageOptions.addEventListener('click', function (event) {
  const selectedFlag = event.target.closest('li').querySelector('.fi').classList[1]; // Get the flag class (e.g. fi-us)
  const selectedLanguage = event.target.closest('li').querySelector('span:nth-child(2)').innerText;

  // Update dropdown button with selected flag and language
  languageDropdown.querySelector('.fi').className = `fi ${selectedFlag}`;
  languageDropdown.querySelector('span:nth-child(2)').innerText = selectedLanguage.charAt(0).toUpperCase() + selectedLanguage.slice(1);

  // Close dropdown
  languageOptions.classList.add('hidden');
});


// Get the modals and buttons
const continueBookingBtns = document.querySelectorAll('.continue-booking-btn'); // Now selecting by class, not by IDconst extrasModal = document.getElementById('extras-modal');
const extrasModal = document.getElementById('extras-modal');

const checkoutModal = document.getElementById('checkout-modal');
const confirmContinueBtns = document.querySelectorAll('.confirm-continue-btn');
const closeExtrasModalBtn = document.getElementById('close-extras-modal');
const closeCheckoutModalBtn = document.getElementById('close-checkout-modal');

// Open Extras Modal
// Loop through each button and add the event listener
continueBookingBtns.forEach(button => {
  button.addEventListener('click', () => {
    extrasModal.classList.remove('hidden');
  });
});

// Close Extras Modal
closeExtrasModalBtn.addEventListener('click', () => {
  extrasModal.classList.add('hidden');
});

confirmContinueBtns.forEach(button => {
  button.addEventListener('click', () => {
    extrasModal.classList.add('hidden');
    checkoutModal.classList.remove('hidden');
  })
})

// Close Checkout Modal
closeCheckoutModalBtn.addEventListener('click', () => {
  checkoutModal.classList.add('hidden');
});

// Handle Extras Selection
document.querySelectorAll('.extras-add-btn').forEach(btn => {
  btn.addEventListener('click', (event) => {
    // Prevent the default action if necessary
    event.preventDefault();

    // Toggle the 'added' class to update button state
    btn.classList.toggle('added');

    if (btn.classList.contains('added')) {
      btn.textContent = 'Added';
      btn.classList.remove('bg-gray-900');  // Remove the old class
      btn.classList.add('bg-green-700');   // Add the new class
    } else {
      btn.textContent = '+';
      btn.classList.remove('bg-green-700'); // Remove the added class
      btn.classList.add('bg-gray-900');   // Add the default class
    }

    // Optionally, you might want to emit Livewire event to handle the addition
    Livewire.emit('addExtra', btn.dataset.key);
  });
});


// Location selection Dropdown
function showLocationDropdown(type) {
  // Hide all dropdowns first
  document.querySelectorAll('.location-dropdown').forEach(dropdown => dropdown.classList.add('hidden'));

  // Show the respective dropdown
  const dropdown = document.getElementById(`${type}-location-dropdown`);
  dropdown.classList.remove('hidden');
}

function selectLocation(type, location) {
  const input = document.getElementById(`${type}-location`);
  input.value = location;

  // Hide the dropdown after selection
  const dropdown = document.getElementById(`${type}-location-dropdown`);
  dropdown.classList.add('hidden');
}

//swiper initialization
var swiper = new Swiper(".mySwiper", {
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    closeExtrasModalBtn: true,
  },
});

document.querySelector('.mySwiper').addEventListener('mouseenter', function () {
  swiper.autoplay.start();
});

document.querySelector('.mySwiper').addEventListener('mouseleave', function () {
  swiper.autoplay.stop();
});

swiper.params.autoplay = {
  delay: 1000,
  disableOnInteraction: false,
};
