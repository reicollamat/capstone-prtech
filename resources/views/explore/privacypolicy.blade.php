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
            <span class="breadcrumb-item active">Privacy Policy</span>
        </x-shop.breadcrumb>
    </div>
    <div class="header d-flex justify-content-center my-3">
        <h1>Privacy Policy</h1>
    </div>

    <div class="container-fluid px-5">
        <div class="p-5">
        <div class="d-flex justify-content-center flex-wrap" id="content">
            <p class="mb-16 text-center">
            This Privacy Policy describes how your personal information is
            collected, used, and shared when you visit or make a purchase from
            PR-TECH. We use Your Personal data to provide and improve the
            Service. By using the Service, You agree to the collection and use
            of information in accordance with this Privacy Policy.
            </p>

            <div class="card p-4">
            <h4>Personal Information We Collect</h4>
            <p>
                When you visit the Site, we automatically collect certain
                information about your device, including information about your
                web browser, IP address, time zone, and some of the cookies that
                are installed on your device.
            </p>
            <p>
                Additionally, as you browse the Site, we collect information about
                the individual web pages or products that you view, what websites
                or search terms referred you to the Site, and information about
                how you interact with the Site. We refer to this
                automatically-collected information as "Device Information."
            </p>
            <p>
                We collect Device Information using the following technologies:
            </p>
            <ul>
                <li style="margin-bottom: 10px">
                &#x2022; "Cookies" are data files that are placed on your device
                or computer and often include an anonymous unique identifier.
                For more information about cookies, and how to disable cookies,
                visit
                <a href="http://www.allaboutcookies.org" target="_blank">
                    http://www.allaboutcookies.org </a
                >.
                </li>
                <li style="margin-bottom: 10px">
                &#x2022; "Log files" track actions occurring on the Site, and
                collect data including your IP address, browser type, Internet
                service provider, referring/exit pages, and date/time stamps.
                </li>
                <li style="margin-bottom: 10px">
                &#x2022; "Web beacons", "tags" and "pixels" are electronic files
                used to record information about how you browse the Site.
                </li>
            </ul>
            <p>
                Additionally, when you make a purchase or attempt to make a
                purchase through the Site, we collect certain information from
                you, including your name, billing address, shipping address,
                payment information (including card numbers, Cash on Delivery, and
                Online Transfer), email address, and phone number. We refer to
                this information as "Order Information."
            </p>
            <p>
                Other information we collect: offline data, purchased marketing
                data/lists.
            </p>
            <p>
                When we talk about "Personal Information" in this Privacy Policy,
                we are talking both about Device Information and Order
                Information.
            </p>
            </div>

            <div class="card mt-3 p-4">
            <h4>How Do We Use Your Personal Information?</h4>
            <p>
                We use the Order Information that we collect generally to fulfill
                any orders placed through the Site (including processing your
                payment information, arranging for shipping, and providing you
                with invoices and/or order confirmations).
            </p>
            <p>Additionally, we use this Order Information to:</p>
            <ul>
                <li style="margin-bottom: 10px">
                &#x2022; Manage your personal account;
                </li>
                <li style="margin-bottom: 10px">
                &#x2022; Attend and manage your requests;
                </li>
                <li style="margin-bottom: 10px">
                &#x2022; Communicate with you;
                </li>
                <li style="margin-bottom: 10px">
                &#x2022; Screen our orders for potential risk or fraud; and
                </li>
                <li style="margin-bottom: 10px">
                &#x2022; When in line with the preferences you have shared with
                us, provide you with information or advertising relating to our
                products or services.
                </li>
            </ul>
            <p>
                We use the Device Information that we collect to help us screen
                for potential risk and fraud (in particular, your IP address), and
                more generally to improve and optimize our Site (for example, by
                generating analytics about how our customers browse and interact
                with the Site, and to assess the success of our marketing and
                advertising campaigns).
            </p>
            </div>

            <div class="card mt-3 p-4">
            <h4>Sharing Your Personal Information</h4>
            <p>
                We may share your Personal Information to comply with applicable
                laws and regulations, to respond to a subpoena, search warrant, or
                other lawful request for information we receive, or to otherwise
                protect our rights or to use for remarketing or targeted
                advertising.
            </p>
            </div>

            <div class="card mt-3 p-4">
            <h4>Retention of Personal Information</h4>
            <p>
                The Company will retain Your Personal Data only for as long as is
                necessary for the purposes set out in this Privacy Policy. When
                you place an order through the Site, we will maintain your Order
                Information for our records unless and until you ask us to delete
                this information.
            </p>
            </div>

            <div class="card mt-3 mb-10 p-4">
            <h4>Changes to This Privacy Policy</h4>
            <p>
                We may update this privacy policy from time to time in order to
                reflect, for example, changes to our practices or for other
                operational, legal, or regulatory reasons. We will notify you of
                any changes by posting the new Privacy Policy on this page. For
                more information about our privacy practices and, if you have
                questions, or if you would like to make a complaint, please
                contact us by e-mail at
                <a href="mailto:hello@prtech.com">hello@prtech.com</a>.
            </p>
            </div>
        </div>
        </div>
    </div>
@endsection
