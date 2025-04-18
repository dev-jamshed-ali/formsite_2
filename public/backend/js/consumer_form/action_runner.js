


// ================== ACTION RUNNER =====================
function ActionRunner(ACTION_TYPE, faceLandmarkResults, handLandmarkResults) {
    switch (ACTION_TYPE) {
        case 'OpenMouth':
            return OpenMouth(faceLandmarkResults);

        case 'BlinkEyes':
            return BlinkEyes(faceLandmarkResults);

        case 'TurnFaceLeft':
            return TurnFaceLeft(faceLandmarkResults);
            
        case 'TurnFaceRight':
            return TurnFaceRight(faceLandmarkResults);

        case 'TouchRightEarWithRightHand':
            return TouchRightEarWithRightHand(faceLandmarkResults, handLandmarkResults);

        case 'TouchRightEarWithLeftHand':
            return TouchRightEarWithLeftHand(faceLandmarkResults, handLandmarkResults);
        
        case 'TouchLeftEarWithRightHand':
            return TouchLeftEarWithRightHand(faceLandmarkResults, handLandmarkResults);

        case 'TouchLeftEarWithLeftHand':
            return TouchLeftEarWithLeftHand(faceLandmarkResults, handLandmarkResults);

        case 'TouchNoseWithRightHand':
            return TouchNoseWithRightHand(faceLandmarkResults, handLandmarkResults);

        case 'TouchNoseWithLeftHand':
            return TouchNoseWithLeftHand(faceLandmarkResults, handLandmarkResults);

        case 'SelfieClick':
            return SelfieClick(faceLandmarkResults);
        
        default:
            return false;
    }
}