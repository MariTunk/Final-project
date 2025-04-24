$(document).ready(function () {
    //  form submission for creating a booking
    $('#bookingForm').on('submit', function (e) {
        e.preventDefault(); 

    
        const bookingData = {
            booking_date: $('#booking_date').val(),
            service_name: $('#service_name').val(),
            henna_type: $('#henna_type').val(),
            notes: $('#notes').val(),
        };

        //  create a new booking
        $.ajax({
            url: '/bookings', 
            type: 'POST',
            data: bookingData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert(response.message); // Show success message
                    $('#bookingForm')[0].reset(); // Reset the form
                    fetchAllBookings(); // Refresh the bookings list
                } else {
                    alert(response.errors.join('\n')); // Show error messages
                }
            },
            error: function (xhr, status, error) {
                console.error("Error saving booking:", status, error);
                console.error("Response:", xhr.responseText); // Log the response for debugging
                alert('Failed to save booking. Please try again.');
            }
        });
    });

    // Function to fetch all bookings and display them
    function fetchAllBookings() {
        $.ajax({
            url: '/bookings', // This should match the route defined in your server
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('#bookings-container').empty(); // Clear previous bookings
                data.forEach(function (value) {
                    $('#bookings-container').append(
                        `<div class="post-container margin-thirty">
                            <span class="post">
                                <span class="bold">Booking ID:</span> ${value.booking_id}<br>
                                <span class="bold">Date:</span> ${value.booking_date}<br>
                                <span class="bold">Service:</span> ${value.service_name}<br>
                                <span class="bold">Henna Type:</span> ${value.henna_type}<br>
                                <span class="bold">Notes:</span> ${value.notes}
                            </span>
                        </div>`
                    );
                });
            },
            error: function (xhr, status, error) {
                console.error("Error fetching bookings:", status, error);
                console.log("Full response:", xhr.responseText); // Add this!
                alert('Failed to fetch bookings. Please try again.');
            }
        });
    }

    // Fetch all bookings on page load
    fetchAllBookings();
});
