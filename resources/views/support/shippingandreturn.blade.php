@extends('layouts.master_layout')
@section('content')
    <style>
        #content {
        max-width: 1300px;
        margin: 0 auto;
        padding: 8px;
        }
        .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transition: box-shadow 0.3s ease-in-out;
        }
    </style>
    <div>
        <x-shop.breadcrumb>
            <span class="breadcrumb-item active">Shipping and Returns</span>
        </x-shop.breadcrumb>
    </div>
    <div class="header d-flex justify-content-center my-3">
        <h1>Shipping Policy</h1>
    </div>

    <!-- Content div -->
    <div class="container-fluid px-5">
        <div class="p-5 text-justify" id="content">
        <p class="text-center mb-16">
            PRTECH can deliver to any serviceable area in the Philippines, subject
            to courier fees depending on location, item weight, item dimensions,
            shipping restrictions, etc. Please read the details on our shipping
            and delivery policy below for your comprehensive understanding.
        </p>

        <!-- Card 1: DELIVERY PERIOD -->
        <div class="card p-3">
            <div class="card-body">
            <h4>DELIVERY PERIOD</h4>
            <p>
                The shipping time will depend on the item, the customer's
                location, time of order confirmation, and availability of the item
                upon the order's confirmation.
            </p>
            <ul>
                <li style="margin-bottom: 10px">
                Generally speaking, based on the courier’s turnaround times
                (LBC):
                <ul>
                    <li style="margin-bottom: 10px">
                    &#x2022; If the customer is within Metro Manila or within
                    nearby provinces, please allow PRTECH 3-5 business days
                    before the item becomes available for domestic
                    shipping/delivery.
                    </li>
                    <li style="margin-bottom: 10px">
                    &#x2022; Deliveries for other Luzon provinces might take 3-7
                    working days for processing and delivery of the order.
                    </li>
                    <li style="margin-bottom: 10px">
                    &#x2022; For deliveries within Visayas and Mindanao, please
                    allow 7-15 working days for delivery processing and delivery
                    of the order.
                    </li>
                </ul>
                </li>
            </ul>
            </div>
        </div>

        <!-- Card 2: REQUIREMENTS TO PRESENT UPON DELIVERY -->
        <div class="card p-3 mt-3">
            <div class="card-body">
            <h4>REQUIREMENTS TO PRESENT UPON DELIVERY</h4>
            <ol>
                <li style="margin-bottom: 10px">
                &#x2022; At least one valid government-issued ID of the person
                who ordered (customer).
                </li>
                <li style="margin-bottom: 10px">
                &#x2022; If the recipient is an authorized representative:
                photocopy of the customer's ID, physical ID of the authorized
                representative, and a written authorization letter containing
                the name of both parties.
                </li>
                <li style="margin-bottom: 10px">
                &#x2022; For credit card purchases, the customer needs to
                present his/her valid ID and the credit card used for the
                purchase. Please do not show your credit card's CVV number; we
                only need to see the name and the last four digits of your
                credit card.
                </li>
            </ol>
            </div>
        </div>

        <!-- Card 3: SHIPPING FEES -->
        <div class="card p-3 mt-3">
            <div class="card-body">
            <h4>SHIPPING FEES</h4>
            <p><strong>Metro Manila Addresses:</strong></p>
            <p>
                For Metro Manila orders, the shipping fee will be calculated based
                on the courier’s policy where it will depend on the product’s
                weight, dimensions, and shipping restrictions. It may range from
                70-150 pesos (depending on location). It will be automatically
                computed and will be displayed during checkout.
            </p>
            <p><strong>Provincial Shipments:</strong></p>
            <p>
                We base these fees on LBC, JRS, and other similar cargo services.
                We will coordinate with the customer regarding these fees before
                the item is shipped out.
            </p>
            </div>
        </div>

        <!-- Card 4: MISSED DELIVERIES -->
        <div class="card p-3 mt-3">
            <div class="card-body">
            <h4>MISSED DELIVERIES</h4>
            <p>
                If in case a delivery within Metro Manila and other selected
                nearby provinces is missed, we will reschedule the next attempt
                for delivery. Please keep your phone open for texts or calls or
                your Facebook messenger open/active, so that you can get updates
                from our customer support team. To provide us with more contact
                details, you can chat with us on our official Facebook account:
                <a href="https://www.facebook.com/PRTECH" target="_blank"
                >https://www.facebook.com/PRTECH</a
                >, call our customer service team at (+63) 939-505-6914, or email
                us at hello@PRTECH.com.
            </p>
            </div>
        </div>

        <!-- Card 5: LIST OF ACCEPTED VALID IDS -->
        <div class="card p-3 mt-3 mb-3">
            <div class="card-body">
            <h4>LIST OF ACCEPTED VALID IDS</h4>
            <ul>
                <li style="margin-bottom: 10px">
                &#x2022; Philippine National ID
                </li>
                <li style="margin-bottom: 10px">
                &#x2022; Passport Driver's License
                </li>
                <li style="margin-bottom: 10px">
                &#x2022; Professional ID (PRC)
                </li>
                <li style="margin-bottom: 10px">&#x2022; Voter&#39;s ID</li>
                <li style="margin-bottom: 10px">&#x2022; SSS</li>
                <li style="margin-bottom: 10px">&#x2022; GSIS</li>
                <li style="margin-bottom: 10px">&#x2022; Senior Citizen ID</li>
                <li style="margin-bottom: 10px">&#x2022; Immigration ID</li>
                <li style="margin-bottom: 10px">&#x2022; UMID ID</li>
                <li style="margin-bottom: 10px">&#x2022; NBI Clearance</li>
                <li style="margin-bottom: 10px">&#x2022; TIN</li>
                <li style="margin-bottom: 10px">&#x2022; Integrated Bar ID</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
@endsection
