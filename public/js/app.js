BASE_URL = 'http://localhost:8080/PRO-1014/'

async function addToCart(id) {
    await fetch(BASE_URL + 'add-cart.php?id=' + id)
        .then(
            function(response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                }

                // Examine the text in the response
                response.json().then(function(data) {
                    console.log(data);
                });
            }
        )
        .catch(function(err) {
            console.log('Fetch Error :-S', err);
        });
}