<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
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
        .then(response => response.json())
        .then(data => updateClientDetails(data))
        .catch(error => console.error('Error:', error));
    }

    function updateClientDetails(client) {
        if (client) {
            document.getElementById('name').value = client.name;
            document.getElementById('address').value = client.address;
            document.getElementById('gst_no').value = client.gst;
            document.getElementById('email').value = client.email;
            document.getElementById('due_amount').value = client.due_ammount;
            document.getElementById('remarks').value = client.remarks;
            document.getElementById('clid').value = client.clid;

        } else {
            document.getElementById('name').value = '';
            document.getElementById('address').value = '';
            document.getElementById('gst_no').value = '';
            document.getElementById('email').value = '';
            document.getElementById('due_amount').value = '';
            document.getElementById('remarks').value = '';
        }
    }

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
            complainSelect.value = '';

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

</script>
