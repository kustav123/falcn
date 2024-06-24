<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);

        // Check if 'mob' parameter exists in the URL
        if (urlParams.has('mob')) {
            // Get the value of 'mob' parameter
            const mobileNumber = urlParams.get('mob');

            // Update the input field with id 'mobile_number'
            document.getElementById('mobile_number').value = mobileNumber;

            // Fetch client details if valid mobile number format
            if (mobileNumber.length === 10 && /^\d+$/.test(mobileNumber)) {
                fetchClientDetails(mobileNumber);
            }
        }

        const mobileNumberInput = document.getElementById('mobile_number');

        mobileNumberInput.addEventListener('input', function() {
            const mobileNumber = mobileNumberInput.value;

            if (mobileNumber.length === 10 && /^\d+$/.test(mobileNumber)) {
                fetchClientDetails(mobileNumber);
            }
        });

        function fetchClientDetails(mobileNumber) {
            fetch('/clients/getcl', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ mobile: mobileNumber })
            })
            .then(response => {
                if (response.status === 404) {
                    // Redirect to the client creation form with the mobile number in the query string
                    window.location.href = `/clients/#addnew?mobile=${mobileNumber}`;
                    return null;
                } else {
                    return response.json();
                }
            })
            .then(data => {
                if (data) {
                    updateClientDetails(data);
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function updateClientDetails(client) {
            if (client) {
                document.getElementById('name').value = client.name;
                document.getElementById('address').value = client.address;
                document.getElementById('gst_no').value = client.gst;
                document.getElementById('email').value = client.email;
                document.getElementById('due_amount').value = client.due_amount;
                document.getElementById('remarks').value = client.remarks;
                document.getElementById('clid').value = client.clid;
            } else {
                // Clear input fields
                document.getElementById('name').value = '';
                document.getElementById('address').value = '';
                document.getElementById('gst_no').value = '';
                document.getElementById('email').value = '';
                document.getElementById('due_amount').value = '';
                document.getElementById('remarks').value = '';
            }
        }

        // Autocomplete by name
        const nameInput = document.getElementById('name');
    const nameSuggestions = document.getElementById('nameSuggestions');

    // Event listener for input changes
    nameInput.addEventListener('input', function() {
        const inputValue = nameInput.value.trim();

        // Clear previous suggestions
        nameSuggestions.innerHTML = '';

        if (inputValue.length >= 3) {
            // Make AJAX request to fetch suggestions
            nameSuggestions.innerHTML = '';

            fetch('/clients/getclbyname', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ name: inputValue })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Process the data and display suggestions
                if (data.length > 0) {
                    data.forEach(client => {
                        const suggestion = document.createElement('div');
                        suggestion.classList.add('suggestion', 'list-group-item');
                        suggestion.textContent = client.name;
                        suggestion.addEventListener('click', function() {
                            updateClientDetails(client);
                            nameSuggestions.innerHTML = ''; // Clear suggestions after selection
                        });
                        suggestion.addEventListener('mouseover', function() {
                            this.classList.add('active'); // Add hover effect
                        });
                        suggestion.addEventListener('mouseout', function() {
                            this.classList.remove('active'); // Remove hover effect
                        });
                        nameSuggestions.appendChild(suggestion);
                    });
                } else {
                    // Handle case where no clients found
                    const noSuggestions = document.createElement('div');
                    noSuggestions.classList.add('no-suggestions', 'list-group-item');
                    noSuggestions.textContent = 'No clients found. Please check name or search by mobile number.';
                    nameSuggestions.appendChild(noSuggestions);
                }
            })
            .catch(error => {
                console.error('Error fetching client suggestions:', error);
                // Handle error scenario
            });
        }
    });


        // Function to update client details
        function updateClientDetails(client) {
            if (client) {
                document.getElementById('mobile_number').value = client.mobile;
                document.getElementById('name').value = client.name;
                document.getElementById('address').value = client.address;
                document.getElementById('gst_no').value = client.gst;
                document.getElementById('email').value = client.email;
                document.getElementById('due_amount').value = client.due_amount;
                document.getElementById('remarks').value = client.remarks;
                document.getElementById('clid').value = client.clid;
            } else {
                // Clear input fields
                document.getElementById('mobile').value = '';
                document.getElementById('address').value = '';
                document.getElementById('gst_no').value = '';
                document.getElementById('email').value = '';
                document.getElementById('due_amount').value = '';
                document.getElementById('remarks').value = '';
            }
        }

        // Item related code
        const itemSelect = document.getElementById('item');
        const makeSelect = document.getElementById('make');
        const accessorySelect = document.getElementById('accessary');
        const complainSelect = document.getElementById('complain');

        fetchItems();

        itemSelect.addEventListener('change', function() {
            const itemId = itemSelect.value;
            fetchItemDetails(itemId);
        });

        function fetchItems() {
            fetch('/items/getitm', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => populateItems(data))
            .catch(error => console.error('Error fetching items:', error));
        }

        function populateItems(items) {
            itemSelect.innerHTML = '<option value="">Select Item</option>';
            items.forEach(item => {
                const option = document.createElement('option');
                option.value = item.itmid;
                option.text = item.name;
                itemSelect.appendChild(option);
            });
        }

        function fetchItemDetails(itemId) {
            fetch('/items/getitmid', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ id: itemId })
            })
            .then(response => response.json())
            .then(data => updateItemDetails(data))
            .catch(error => console.error('Error fetching item details:', error));
        }

        function updateItemDetails(item) {
            if (item) {
                makeSelect.innerHTML = '';
                accessorySelect.innerHTML = '';
                complainSelect.innerHTML = '';

                const makes = item.make.split(',');
                makes.forEach(make => {
                    const option = document.createElement('option');
                    option.value = make;
                    option.text = make;
                    makeSelect.appendChild(option);
                });

                const accessories = item.accessary.split(',');
                accessories.forEach(accessary => {
                    const option = document.createElement('option');
                    option.value = accessary;
                    option.text = accessary;
                    accessorySelect.appendChild(option);
                });

                const complains = item.complain.split(',');
                complains.forEach(complain => {
                    const option = document.createElement('option');
                    option.value = complain;
                    option.text = complain;
                    complainSelect.appendChild(option);
                });
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const searchByMobile = document.getElementById('search_by_mobile');
        const searchByName = document.getElementById('search_by_name');
        const mobileNumberInput = document.getElementById('mobile_number');
        const nameInput = document.getElementById('name');

        // Initially set mobile number input to enabled and name input to readonly
        mobileNumberInput.removeAttribute('readonly');
        nameInput.setAttribute('readonly', 'readonly');

        // Event listener for radio buttons
        searchByMobile.addEventListener('change', function() {
            mobileNumberInput.removeAttribute('readonly');
            nameInput.setAttribute('readonly', 'readonly');
            nameInput.value = ''; // Clear name input if switched
        });

        searchByName.addEventListener('change', function() {
            nameInput.removeAttribute('readonly');
            mobileNumberInput.setAttribute('readonly', 'readonly');
            mobileNumberInput.value = ''; // Clear mobile number input if switched
        });
    });


    </script>
