for (let i = 0; i < document.forms.length; i++) {
    const form = document.forms[i];
    form.addEventListener("submit", (e) => {
        // dont allow refresh browser after submit
        e.preventDefault();
        document.getElementById("message").innerHTML = "";
        // get all inputs inside form
        const inputs = form.getElementsByTagName("input");

        let data = "";
        let token = null;

        // loop through all inputs
        for (const key in inputs) {
            // if inputs does not Html element, continue loop
            if (!(inputs[key] instanceof HTMLElement)) {
                continue;
            }
            // get single input
            const input = inputs[key];
            // get input name
            const name = input.name;
            // get input value
            const value = input.value;
            // if input is token, continue loop
            if (name === "_token") {
                token = value;
                continue;
            }
            // set border color input to default.
            input.style.borderColor = "darkviolet";
            // empty error message input
            input.nextElementSibling.innerHTML = "";
            // if input has NOT value, continue loop
            if (value === "") continue;

            if (input.type === "checkbox" && !input.checked) continue;

            // set data with name and value input, 'name=something&password=somethingElse'
            data += `${name}=${value}&`;
        }
        // create new request
        const xhttp = new XMLHttpRequest();
        // set async request
        xhttp.open(form.method, form.action, true);
        // set csrf token in header request
        xhttp.setRequestHeader("x-csrf-token", token);
        // set content type in header request for received data from backend
        xhttp.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
        );
        // send data
        xhttp.send(data);
        // after get response
        xhttp.onload = () => {
            const responseData = JSON.parse(xhttp.response);
            switch (xhttp.status) {
                case 200:
                    location.href = responseData.redirect;
                    break;
                case 422:
                    for (const key in responseData.errors) {
                        // get input
                        const input = document.getElementById(key);
                        // set error message
                        input.nextElementSibling.innerHTML =
                            responseData.errors[key];
                        // set border color to red
                        input.style.borderColor = "red";
                    }
                    break;
                default:
                    document.getElementById("message").innerHTML =
                        responseData.message;
            }
        };
    });
}
