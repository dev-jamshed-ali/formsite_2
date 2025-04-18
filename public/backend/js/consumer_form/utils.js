

// const API_URL = "http://localhost:3003";
const API_URL = "https://george-backend.quantilence.com";

 

const verifyActionAPI = async (data) => {
    try {
        const response = await fetch(`${API_URL}/api/verify-action`, {
            method: 'POST',
            mode: 'cors',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        return response.json()
    } catch (error) {
        console.error("API Call error: ", error)
        return error
    }
}

/* =========== API utils ============================ */

const UserRegistrationAPI = async(guid) => {
    const response = await fetch(`${API_URL}/api/register`, {
        method: "POST",
        mode: "cors",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ "gui":guid})
    })
    return response.json()
}



const verifySelfieImageAPI = async (data) => {
    try {
        const response = await fetch(`${API_URL}/api/final-image`, {
            method: "POST",
            mode: "cors",
            credentials: "same-origin",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data)
        })
        return response.json()
    } catch (error) {
        console.log("ERROR: ", error);
        return error
    }
    
}
