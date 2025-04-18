// Toggle Eye
if (typeof EyePassword == 'undefined') {
  var EyePassword = document.querySelector(".eye");
}
if (typeof passwordInput == 'undefined') {

  var passwordInput = document.querySelector(".pass");
}
if (typeof mybars == 'undefined') {

  var mybars = document.getElementById("bars");
}
if (typeof cross == 'undefined') {

  var cross = document.getElementById("cross-icon");
}
if (typeof sidebarleft == 'undefined') {
  var sidebarleft = document.querySelector(".dashboard .left");
}

// Video Open
if(typeof webcamOpen == 'undefined'){
  var webcamOpen = false;
}

function toggleWebcam() {
  const overlay = document.getElementById("overy");
  const videoContainer = document.getElementById("video-container");
  if (!webcamOpen) {
    openWebcam();
    overlay.style.display = "block";
    videoContainer.style.display = "block";
  } else {
    closeWebcam();
  }
}

function openWebcam() {
  if (!webcamOpen) {
    // Use the getUserMedia API to access the webcam
    navigator.mediaDevices
      .getUserMedia({ video: true })
      .then((stream) => {
        // Create a video element to display the webcam stream
        const video = document.createElement("video");
        video.srcObject = stream;
        video.autoplay = true;

        // Append the video element to the video container
        const videoContainer = document.getElementById("video-container");
        videoContainer.appendChild(video);

        // Update webcam status
        webcamOpen = true;
      })
      .catch((error) => {
        console.error("Error accessing webcam:", error);
      });
  }
}

function closeWebcam() {
  // Hide the overlay and video container
  const overlay = document.getElementById("overlay");
  const videoContainer = document.getElementById("video-container");
  overlay.style.display = "none";
  videoContainer.style.display = "none";

  // Remove the video element
  const video = document.querySelector("#video-container video");
  if (video) {
    video.srcObject.getTracks().forEach((track) => track.stop());
    video.remove();
  }

  // Update webcam status
  webcamOpen = false;
}
if(mybars){
  // Handle left sidebar
  mybars.addEventListener("click", function () {
    sidebarleft.style.display = "block";
  });
}
if (cross) {
  // on cross click hide left sidebar
  cross.addEventListener("click", function () {
    sidebarleft.style.display = "none";
  });
  
}
if (EyePassword) {
  EyePassword.addEventListener("click", function () {
    toggleInput();
  });
}
function toggleInput() {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    EyePassword.src = "img/eye-open.png";
  } else {
    passwordInput.type = "password";
    EyePassword.src = "img/eye-close.svg"; // Assuming this is the path to your closed eye icon
  }
}
// Otp Moving to next Field or Remove
function moveToNextOrRemove(currentInput, previousInputId, nextInputId) {
  if (event.keyCode === 8 && currentInput.value === "") {
    document.getElementById(previousInputId).focus();
    document.getElementById(previousInputId).value = "";
  } else if (currentInput.value !== "" && nextInputId !== "") {
    document.getElementById(nextInputId).focus();
  }
}
// Hanlde Otp Paste
function handlePaste(e) {
  e.preventDefault();
  var clipboardData = e.clipboardData || window.clipboardData;
  var pastedData = clipboardData.getData("text");

  if (pastedData.length >= 6) {
    var digits = pastedData.split("");
    console.log(digits);
    document.getElementById("digit1").value = digits[0];
    document.getElementById("digit2").value = digits[1];
    document.getElementById("digit3").value = digits[2];
    document.getElementById("digit4").value = digits[3];
    document.getElementById("digit5").value = digits[4];
    document.getElementById("digit6").value = digits[5];
    document.getElementById("digit6").focus();
  }
}
