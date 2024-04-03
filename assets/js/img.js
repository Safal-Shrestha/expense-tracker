const imageSelector = document.getElementById('imageSelector');
const selectedImage = document.getElementById('selected-image');
const imageBackground = document.getElementById('image-control');
let isFirstSelection = true; // Flag to track if this is the first selection

imageSelector.addEventListener('change', function() {
  const selectedOption = this.value;
  let imagePath;

  switch(selectedOption) {
    case '1010':
        imagePath = 'assets/img/fng.png';
        break;
    case '1011':
        imagePath = 'assets/img/tp.png';
        break;
    case '1012':
        imagePath = 'assets/img/hnm.png';
        break;
    case '1013':
        imagePath = 'assets/img/entertainment.png';
        break;
    case '1014':
        imagePath = 'assets/img/education.png';
        break;
    case '1015':
        imagePath = 'assets/img/health.png';
        break;
    default:
      imagePath = '';
  }

  selectedImage.src = imagePath;

  // If this is the first selection, toggle the class
  if (isFirstSelection) {
    isFirstSelection = false; // Update the flag after the first selection
    imageBackground.classList.toggle("show-image");
  }
});