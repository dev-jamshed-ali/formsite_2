/**************************************
      action performance validation
***************************************/
// https://ai.google.dev/edge/mediapipe/solutions/vision/hand_landmarker

const euclideanDistance = (a, b) => 
  Math.hypot(...Object.keys(a).map(k => b[k] - a[k]));


const eyeRatio = (eyeLower, eyeUpper) => {
// console.log("EYE: ", eyeLower, eyeUpper);
// vertical
let A = euclideanDistance(eyeLower[3].slice(0,2), eyeUpper[2].slice(0,2))
let B = euclideanDistance(eyeLower[4].slice(0,2), eyeUpper[3].slice(0,2))
    
// Horizontal
let C = euclideanDistance(eyeLower[0].slice(0,2), eyeUpper[eyeUpper.length-1].slice(0,2))
    
return (A + B) / (2.0 * C)
}

// Function to get the index of the right hand
// reverse
const getRightHandIndex = (handednesses) => {
for (let i = 0; i < handednesses.length; i++) {
if (handednesses[i][0].categoryName === 'Left') {
return i;
}
}
return null; // Return null if no right hand is found
}


// Function to get the index of the left hand
const getLeftHandIndex = (handednesses) => {
for (let i = 0; i < handednesses.length; i++) {
if (handednesses[i][0].categoryName === 'Right') {
return i;
}
}
return null; // Return null if no left hand is found
}

// ====================== BlinkEyes ===============================
let COUNTER = 0
const BlinkEyes = (predictions) => {
if (predictions["faceBlendshapes"].length > 0) {
let letfEyeBlink = predictions["faceBlendshapes"][0]["categories"].filter(f => f["categoryName"] === "eyeBlinkLeft")
// console.log("LEFT Eye Blink: ", letfEyeBlink[0]["score"]);

if (letfEyeBlink[0]["score"] > 0.40) {
    COUNTER += 1
}
// console.log(COUNTER);

if (COUNTER > 20) {
    COUNTER = 0
    return true
}
}
}


// ====================== Mouth Open ===============================
const OpenMouth  = (predictions) => {
if (predictions["faceBlendshapes"].length > 0) {
let jawOpen = predictions["faceBlendshapes"][0]["categories"].filter(f => f["categoryName"] === "jawOpen")

if (jawOpen[0]["score"] > 0.40) {
    console.log("Mouth OPEN!")
    return true
}
}
}


// ====================== Selfie Click ===============================
const SelfieClick = (faceLandmarks) => {
if (faceLandmarks["faceBlendshapes"].length > 0) {
let lefttCheek = faceLandmarks["faceLandmarks"][0][323]
let rightCheek = faceLandmarks["faceLandmarks"][0][93]
  
let center = (lefttCheek.x + rightCheek.x) / 2.0
let face_width = lefttCheek.x - rightCheek.x;

if (center < 0.45 || center > 0.55) {
    return "Move to Center";
}
else {
  if (face_width < 0.20) {
      return "Move Closer";
    }
  else if (face_width > 0.24) {
      return "Move Back";
    }
  else {
      showSuccessToast("Step Completed: Face Position Correct");
      return true;
  }
}
}
}


// ================ Touch Nose with Left Hand ==========================
const TouchNoseWithLeftHand = (faceLandmarks, handmarks) => {
let leftHandIndex = getLeftHandIndex(handmarks["handednesses"]);
if (leftHandIndex !== null && faceLandmarks["faceLandmarks"].length > 0 && handmarks["landmarks"].length > 0) {
let nose = faceLandmarks["faceLandmarks"][0][4];
let leftHand = handmarks["landmarks"][0][8];

let distance = euclideanDistance(nose, leftHand);

if (distance < 0.035) {
    showSuccessToast("Step Completed: Touch Nose with Left Hand");
    return true;
}
}
}


// ================== Touch Nose with Right Hand =====================
const TouchNoseWithRightHand = (faceLandmarks, handmarks) => {
let rightHandIndex = getRightHandIndex(handmarks["handednesses"]);
if (rightHandIndex !== null && faceLandmarks["faceLandmarks"].length > 0 && handmarks["landmarks"].length > 0) {
let nose = faceLandmarks["faceLandmarks"][0][4];
let rightHand = handmarks["landmarks"][0][8];

let distance = euclideanDistance(nose, rightHand);

if (distance < 0.035) {
    showSuccessToast("Step Completed: Touch Nose with Right Hand");
    return true;
}
}
}


// ===================== Touch Left Ear with Left Hand ==========
// refer diagram https://github.com/google/mediapipe/issues/1724
// left cheek 323, right cheek 93
const TouchLeftEarWithLeftHand = (faceLandmarks, handmarks) => {
let leftHandIndex = getLeftHandIndex(handmarks["handednesses"]);
if (leftHandIndex !== null && faceLandmarks["faceLandmarks"].length > 0 && handmarks["landmarks"].length > 0) {
let leftEar = faceLandmarks["faceLandmarks"][0][323];
let leftHand = handmarks["landmarks"][0][8];

let distance = euclideanDistance(leftEar, leftHand);

if (distance < 0.035) {
    showSuccessToast("Step Completed: Touch Left Ear with Left Hand");
    return true;
}
}
}


// ===================== Touch Left Ear with Right Hand ==========
// refer diagram https://github.com/google/mediapipe/issues/1724
// left cheek 323, right cheek 93
const TouchLeftEarWithRightHand = (faceLandmarks, handmarks) => {
let rightHandIndex = getRightHandIndex(handmarks["handednesses"]);
if (rightHandIndex !== null && faceLandmarks["faceLandmarks"].length > 0 && handmarks["landmarks"].length > 0) {
let leftEar = faceLandmarks["faceLandmarks"][0][323];
let rightHand = handmarks["landmarks"][0][8];

let distance = euclideanDistance(leftEar, rightHand);

if (distance < 0.035) {
    showSuccessToast("Step Completed: Touch Left Ear with Right Hand");
    return true;
}
}
}



// ===================== Touch Right Ear with Left Hand ==========
// refer diagram https://github.com/google/mediapipe/issues/1724
// left cheek 323, right cheek 93
const TouchRightEarWithLeftHand = (faceLandmarks, handmarks) => {
let leftHandIndex = getLeftHandIndex(handmarks["handednesses"]);
if (leftHandIndex !== null && faceLandmarks["faceLandmarks"].length > 0 && handmarks["landmarks"].length > 0) {
let rightEar = faceLandmarks["faceLandmarks"][0][93];
let leftHand = handmarks["landmarks"][0][8];

let distance = euclideanDistance(rightEar, leftHand);

if (distance < 0.035) {
    showSuccessToast("Step Completed: Touch Right Ear with Left Hand");
    return true;
}
}
}



// ===================== Touch Right Ear with Right Hand ==========
// refer diagram https://github.com/google/mediapipe/issues/1724
// left cheek 323, right cheek 93
const TouchRightEarWithRightHand = (faceLandmarks, handmarks) => {
let rightHandIndex = getRightHandIndex(handmarks["handednesses"]);
if (rightHandIndex !== null && faceLandmarks["faceLandmarks"].length > 0 && handmarks["landmarks"].length > 0) {
let rightEar = faceLandmarks["faceLandmarks"][0][93];
let rightHand = handmarks["landmarks"][0][8];  

let distance = euclideanDistance(rightEar, rightHand);

if (distance < 0.035) {
    showSuccessToast("Step Completed: Touch Right Ear with Right Hand");
    return true;
}
}

}



// ==================== Turn Face to Left =================
// refer diagram https://github.com/google/mediapipe/issues/1724
// left cheek 323, right cheek 93, nose (4)
const TurnFaceLeft = (faceLandmarks) => {
if (faceLandmarks["faceBlendshapes"].length > 0) {
let lefttCheek = faceLandmarks["faceLandmarks"][0][323]
let rightCheek = faceLandmarks["faceLandmarks"][0][93]
let nose = faceLandmarks["faceLandmarks"][0][4]

let center = (lefttCheek.x + rightCheek.x) / 2.0    

// console.log("TurnLeft: ", (nose.x - center));
if ((nose.x - center) > 0.06) {
    showSuccessToast("Step Completed: Turn Face Left");
    return true
}
}
}

// ==================== Turn Face to Right =================
// refer diagram https://github.com/google/mediapipe/issues/1724
// left cheek 323, right cheek 93, nose (4)
const TurnFaceRight = (faceLandmarks) => {
if (faceLandmarks["faceBlendshapes"].length > 0) {
let lefttCheek = faceLandmarks["faceLandmarks"][0][323]
let rightCheek = faceLandmarks["faceLandmarks"][0][93]
let nose = faceLandmarks["faceLandmarks"][0][4]

let center = (lefttCheek.x + rightCheek.x) / 2.0
// console.log("TurnRight: ", (nose.x - center));

if ((nose.x -  center) < -0.06 ) {
    showSuccessToast("Step Completed: Turn Face Right");
    return true
}

}
}

// Add this function at the top of your file
const showSuccessToast = (message) => {
    const toastElement = document.getElementById('successToast');
    const messageElement = document.getElementById('toastMessage');
    messageElement.textContent = message;
    
    const toast = new bootstrap.Toast(toastElement, {
        animation: true,
        autohide: true,
        delay: 3000
    });
    toast.show();
}
