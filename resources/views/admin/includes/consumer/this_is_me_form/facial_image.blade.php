<fieldset
    class="wizard-fieldset mt-4  @if(!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_eight') show @endif"
    id="fieldset_eight">
    @php
     $admin = \App\Helper\Helper::auth_admin();
    @endphp
    <input type="hidden" name="form_section" value="facial_image_upload" />
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>

    <link href="{{ asset('public/backend/css/styles2.css') }}" rel="stylesheet" />
    <h4 class="stepper-right-f1 mb-3">8. Face Recognition</h4>
    <div>
        <h4 class="face-rec-h1">
            We need to make sure it's you.
        </h4>
        <p class="face-rec-h2">
            For 21st Century Ginicoe Liveness Detection - Please
            Position your eyes in your web camera. Follow the set of
            random instructions. If you are new to us, you are
            half-way completed. If you are returning to us, welcome
            back!
        </p>
        <h4 id="action_name" class="face-rec-h1 mb-0">
            ACTION will be displayed here
        </h4>
        <p id="selfie_instruction"></p>


    </div>
    <div class="row">
        <div class="col-md-5" id="camera_stream_container">
            <div id="overlay" style="display: block;">
                <div class="cv-spinner">
                    <span class="spinner"></span>
                    <span style="color: aqua;" id="spinner_text"></span>
                </div>

            </div>

            <!-- VIDEO -->

            <div class="camera-image">
                <div class="cameraContainer mb-3" class="w-100">
                    <video id="webcam" autoplay playsinline width="400" height="270"
                        style="transform: scale(-1,1);"></video>
                    <canvas class="output_canvas" id="output_canvas"
                        style="position: absolute; left: 0px; top: 0px;"></canvas>
                </div>
            </div>
            <div id="video-container "></div>
        </div>
        <div class="col-md-7  mb-3">
            <h4 class="face-rec-h1">Notice and Consent</h4>
            <p class="face-rec-h2">
                I acknowledge and voluntarily consent to opt-in and
                have read the terms and conditions, and privacy, and
                agree to the following:
            </p>
            <ul class="face-rec-h3">
                <li>
                    My face biometric identifier is unique and is being
                    collected or stored with military grade encryption.
                </li>
                <li>
                    My biometric is collected for the purpose to
                    authenticate all transactions at the
                    point-of-interaction including financial
                    transactions.
                </li>
                <li>
                    My biometric is stored for the length of indefinite
                    time and can be destroyed at any time I opt-out or
                    disenroll.
                </li>
                <li>
                    My biometric maybe disclosed or redisclosed and
                    disseminated as necessary to complete a financial
                    transaction and/or to reveal my likeness to a
                    similar likeness and in doing so I agree that this
                    is no way will diminish the value of my likeness.
                </li>
                <li>
                    I understand that Ginicoe will never sell, lease, or
                    trade, my biometric for profit, promotion,
                    advertising without my express consent.
                </li>
            </ul>
            <a class="btn btn-success" id="update_proccess_btn" href="#" onclick="resertProccess()">Update Proccess</a>

        </div>

    </div>
    <div class="row mt-3">
        <div class="col col-5">
            <div class="col-md-12 mt-2 ">
                <div class="form-check form-switch pb-2">
                    <input class="form-check-input" type="checkbox" @if(!empty($facial_image) &&
                        $facial_image->like_to_have_global_look_alike == 1) checked @endif
                    name="like_to_have_global_look_alike" value="1" role="switch" />
                    <label class="form-check-label face-rec-h3" for="your-responce">Do
                        you wish to opt-in for 'counter-part consent'
                        for your global look-alike to see you?
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-check form-switch pb-2">
                    <input class="form-check-input" type="checkbox" @if(!empty($facial_image) &&
                        $facial_image->to_see_global_look_alike == 1) checked @endif name="to_see_global_look_alike"
                    value="1" role="switch" id="to_see_global_look_alike" />
                    <label class="form-check-label face-rec-h3" for="your-responce">Do
                        you wish to opt-in for 'counter-part consent'
                        to see your global look alike?
                    </label>
                </div>
            </div>
        </div>
        <div class="col col-6">
            <div class="col-md-12">
                <div class="form-check form-switch pb-2">
                    <input class="form-check-input" @if(!empty($facial_image) && $facial_image->privacy == 1) checked
                    @endif type="checkbox" name="privacy"
                    id="your-responce" />
                    <label class="form-check-label face-rec-h3" for="your-responce">By
                        selecting yes, I therefore waive my privacy for
                        these<br />
                        intended purposes. I hereby grant written release of
                        my biometric to Ginicoe, it's subsidiaries, third
                        party affiliates, and other authorized agents.
                    </label>
                </div>
            </div>
        </div>
    </div>
    <button type="button" name="previous" onclick="returnLater('fieldset_eight','consumer_this_is_me')"
        class="form-wizard-return-btn arrow-btn float-start">
        <img src="{{asset('/public/files/img/arrow-back.png')}}" alt="btn-arrow" value="Pause and Return Later" />
        Pause and Return Later
    </button>

    <button type="button" name="next" onclick="checkFieldSetFacialImageUpload()" href="javascript:;"
        class="form-wizard-next-btn arrow-btn float-end">
        Save & Continue
        <img src="{{asset('/public/files/img/btn-arrow.png')}}" alt="btn-arrow" />
    </button>
    <script src="{{ asset('public/backend/js/consumer_form/action_runner.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/actions.js') }}"></script>
    <script src="{{ asset('public/backend/js/consumer_form/utils.js') }}"></script>

    <script>
        var admin=@json($admin);
        var guid=admin.guid;
        function checkCamera() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then(function(stream) {
                        // Stop the stream immediately since we're just checking permission
                        stream.getTracks().forEach(track => track.stop());
                    })
                    .catch(function(error) {
                        alert('Camera access denied or not supported.');
                        closeProcessing()
                    });
            } else {
                // Browser does not support getUserMedia API
                alert('Camera not supported by this browser.');
            }
        }
        
        // Remove the immediate checkCamera() call
        // Instead, only check camera when this fieldset becomes active
        function initializeCameraCheck() {
            // Check if we're on fieldset_eight and it's active
            if ($("#fieldset_eight").hasClass("show")) {
                checkCamera();
            }
        }

        // Add event listeners for fieldset activation
        $(document).ready(function() {
            // Listen for fieldset changes
            $(".stepper-item").on("click", function() {
                if ($(this).data("step") === "fieldset_eight") {
                    setTimeout(initializeCameraCheck, 500); // Small delay to ensure fieldset is shown
                }
            });

            // Check if we're returning directly to fieldset_eight
            if ($("#fieldset_eight").hasClass("show")) {
                setTimeout(initializeCameraCheck, 500);
            }
        });

        let runningMode = "IMAGE";
        let faceLandmarkerREF = undefined;
        let handLandmarkerREF = undefined;
        let webcamRunning = false;
        var cameraContainer = $(".cameraContainer");
        var overlay = $("#overlay");
        var cameraStream = document.getElementById("webcam");
        var camera_container = document.getElementById('camera_stream_container')
        let videoWidth = 400;
        const canvasElement = document.getElementById("output_canvas");
        let intervalReference = setInterval(() => {
            if (~~camera_container.clientWidth) {
                clearInterval(intervalReference)
                videoWidth = ~~(camera_container.clientWidth) - 40;
            }
        }, 200);

        function resertProccess() {
            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.consumer.update_process')}}",
                data: {
                    "gui": guid
                },
                type: 'POST',
                dataType: 'json',
                success: function(result) {
                    location.reload();
                },
                error: function(data) {
                    alert("Credit card does not exist or already reset.");
                }
            });
        }

        // Check if webcam access is supported.
        function hasGetUserMedia() {
            return !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia);
        }

        const openCamera = () => {
            cameraContainer.show();
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function(stream) {
                    // hide SPINNER
                    overlay.hide();
                    cameraStream.srcObject = stream;
                })
                .catch(function(error) {
                    overlay.hide();
                    console.error('Error accessing the camera:', error);
                });
        }

        const closeCamera = () => {
            cameraContainer.hide();

            var stream = cameraStream.srcObject;
            if (stream) {
                var tracks = stream.getTracks();
                tracks.forEach(function(track) {
                    track.stop();
                });
            }
        }

        const showProcessing = () => {
            overlay.show();
        }

        const closeProcessing = () => {
            overlay.hide();
        }


        var action_name = document.getElementById("action_name");
        var selfie_instruction = document.getElementById("selfie_instruction");
        var spinner_text = document.getElementById("spinner_text");
        const canvasCtx = canvasElement.getContext("2d");
        let enableWebcamButton;
        let HAND_CONNECTIONS = 2;

        // Declare variables
    </script>
    <script type="module">
    import vision from "https://cdn.jsdelivr.net/npm/@mediapipe/tasks-vision@0.10.0";
    const {
        FaceLandmarker,
        FilesetResolver,
        HandLandmarker,
        DrawingUtils
    } = vision;

    let api_response = null;

    setTimeout(() => {
        <?php
                if (!empty($this_is_me_return_back_data) && $this_is_me_return_back_data->fieldset_id == 'fieldset_eight') {
                    echo "RunActions();";
                }
                ?>
    }, 1000)

    // Before we can use HandLandmarker class we must wait for it to finish
    // loading. Machine Learning models can be large and take a moment to
    // get everything needed to run.
    const createFacelandmarker = async () => {
        try {
            const filesetResolver = await FilesetResolver.forVisionTasks(
                // Later we need to upload these models to our server
                "https://cdn.jsdelivr.net/npm/@mediapipe/tasks-vision@0.10.0/wasm"
            );
            faceLandmarkerREF = await FaceLandmarker.createFromOptions(filesetResolver, {
                baseOptions: {
                    modelAssetPath: `https://storage.googleapis.com/mediapipe-models/face_landmarker/face_landmarker/float16/1/face_landmarker.task`,
                    delegate: "GPU"
                },
                outputFaceBlendshapes: true,
                runningMode,
                numFaces: 5
            });
            console.log("Face landmarker", faceLandmarkerREF);
        } catch (error) {
            console.log('====================================');
            console.log(error);
            console.log('====================================');
        }
    }

    // Load hand recognition models
    const createHandLandmarker = async () => {
        try {
            const vision = await FilesetResolver.forVisionTasks(
                "https://cdn.jsdelivr.net/npm/@mediapipe/tasks-vision@0.10.0/wasm"
            );
            handLandmarkerREF = await HandLandmarker.createFromOptions(vision, {
                baseOptions: {
                    modelAssetPath: `https://storage.googleapis.com/mediapipe-models/hand_landmarker/hand_landmarker/float16/1/hand_landmarker.task`,
                    delegate: "GPU"
                },
                runningMode: runningMode,
                numHands: 2
            });
            console.log("Handland marker", handLandmarkerREF);
        } catch (error) {
            console.log('====================================');
            console.log("Handlandmark Error:", error);
            console.log('====================================');
        }
    };

    // ========= WAIT to load models ==================
    function RunActions() {
      
        if (guid == '') {
            closeProcessing()
            return;
        }
        if (api_response !== null && api_response.actions_size === 0 && api_response.selfie_status === 'completed') {
            $('#update_proccess_btn').removeClass('d-none');
            closeCamera();
            closeProcessing();
        } else {
            checkCamera()
            Promise.all([createFacelandmarker(), createHandLandmarker()]).then(async () => {
                // CALL UserRegistrationAPI
                api_response = await UserRegistrationAPI(guid)

                if (api_response.action_status === 'waiting') {
                    alert(`on hold, try after ${api_response.time_left} minutes.`)
                } else if (api_response.action_status === 'completed' && api_response.selfie_status ===
                    'completed') {
                    alert(api_response.message);
                    action_name.innerText = api_response.message;
                    $('#update_proccess_btn').removeClass('d-none');
                    closeProcessing();
                } else if (api_response.action_status === 'created' || api_response.action_status ===
                    'pending' || api_response?.selfie_status === 'pending') {
                    action_name.innerText = api_response.action;

                    if (!hasGetUserMedia()) {
                        alert('Webcam not supported!');
                        return;
                    } else if (!faceLandmarkerREF || !handLandmarkerREF) {
                        console.log("Wait! models not loaded yet.");
                        return;
                    } else {
                        webcamRunning = true;
                        // START Camera
                        openCamera();
                        predictWebcam();
                    }
                }


            }).catch(err => {
                console.log('====================================');
                console.log("runAction Err: ", err);
                console.log('====================================');
                alert("Error while loading models, try refreshing!")
            });

        }

    }


    // ---------- Binding Event ----------
    bindEvents();


    let lastVideoTime = -1;
    let faceLandmarkResults = undefined;
    let handLandmarkResults = undefined;

    async function predictWebcam() {
        // spinner_text.innerText = ""
        const ratio = cameraStream.videoHeight / cameraStream.videoWidth;
        cameraStream.style.width = videoWidth + "px";
        cameraStream.style.height = videoWidth * ratio + "px";
        canvasElement.style.width = videoWidth + "px";
        canvasElement.style.height = videoWidth * ratio + "px";
        canvasElement.width = cameraStream.videoWidth;
        canvasElement.height = cameraStream.videoHeight;

        // Now let's start detecting the stream.
        if (runningMode === "IMAGE") {
            runningMode = "VIDEO";
            await faceLandmarkerREF.setOptions({
                runningMode: runningMode
            });
            await handLandmarkerREF.setOptions({
                runningMode: runningMode
            });
        }

        let nowInMs = Date.now();
        let startTimeMs = performance.now();

        if (lastVideoTime !== cameraStream.currentTime) {
            lastVideoTime = cameraStream.currentTime;
            faceLandmarkResults = faceLandmarkerREF.detectForVideo(cameraStream, nowInMs);
            handLandmarkResults = handLandmarkerREF.detectForVideo(cameraStream, startTimeMs);
            
        }
        if (faceLandmarkResults.faceLandmarks || handLandmarkResults.landmarks) {
            // console.log("Number of Faces: ", faceLandmarkResults.faceLandmarks.length)

            let ACTION_TYPE = api_response.action; // GET it from API
            let action_runner_result = ActionRunner(ACTION_TYPE, faceLandmarkResults, handLandmarkResults);
            if (action_runner_result === true) {
                selfie_instruction.innerText = ""
                // canvasCtx.drawImage( cameraStream, 0, 0, canvasElement.width, canvasElement.height );
                const canvas = document.createElement('canvas');
                canvas.width = cameraStream.videoWidth;
                canvas.height = cameraStream.videoHeight;
                canvas.getContext('2d').drawImage(cameraStream, 0, 0, canvasElement.width, canvasElement.height);

                let image = canvas.toDataURL('png');
                // console.log(image)

                // STOP CAMERA, start LOADING, call ActionVerify API
                webcamRunning = false;
                // showProcessing();
                closeCamera();

                if (ACTION_TYPE === 'SelfieClick') {
                    let data = {
                        'image': image,
                        'uid': api_response.uid,
                        'gui': guid
                    }
                    showProcessing();
                    spinner_text.innerText = "Verifying ..."
                    verifySelfieImageAPI(data).then(resp => {
                        console.log(resp , "respfffffffffffff")
                        if (resp.status === 'fail') {
                            console.log("uid: ", resp.uid);
                            alert("Failed, try after 20 minutes");
                         //   closeProcessing();

                        } else {

                            action_name.innerText = 'Process completed';
                            closeCamera();
                            closeProcessing();

                        }
                    }).catch(error => alert(error.message))
                } else {
                    let data = {
                        'image': image,
                        'uid': api_response.uid,
                        'action': api_response.action,
                        'gui': guid
                    }
                    showProcessing();
                    spinner_text.innerText = "Verifying ..."
                    verifyActionAPI(data).then(resp => {
                        if (resp.message !== 'success') {
                            alert(`Failed, try after ${resp.waiting_time} minutes`)
                        } else {
                            closeProcessing()
                            api_response = resp;
                            console.log('success');
                            if (resp.actions_size === 0 && resp?.selfie_status === 'completed') {

                                action_name.innerText = 'Process completed';
                                closeCamera();
                                closeProcessing();
                            } else {
                                RunActions();
                            }
                        }
                    }).catch(error => alert(error.message))
                }


            } else if (![true, false].includes(action_runner_result)) {
                // console.log("action_runner_result: ", action_runner_result)
                if (ACTION_TYPE === 'SelfieClick' && action_runner_result !== undefined) {
                    selfie_instruction.innerText = action_runner_result
                }
            }
        }

        // Call this function again to keep predicting when the browser is ready.
        if (webcamRunning === true) {
            window.requestAnimationFrame(predictWebcam);
        }
    }

    // ------------ Event Binding ---------------
    function bindEvents() {
        function commonEventHandling() {
            setTimeout(() => {
                RunActions();
            }, 1000);
        }
        $("#fieldset_seven #charge_card_information_button, div#facial_image_upload_bar, #fieldset_nine a.form-wizard-return-btn")
            .click(commonEventHandling);
    }
    // ------------End of Event Binding ---------
    </script>

    <!-- Toast Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i>
                    <span id="toastMessage"></span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <!-- Add this to your existing style section or create one -->
    <style>
    .toast {
        opacity: 1 !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .toast-container {
        z-index: 9999;
        top: 20px !important;
        bottom: auto !important;
    }
    </style>
</fieldset>