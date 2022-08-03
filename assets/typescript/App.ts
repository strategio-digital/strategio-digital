/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */

import FormValidator from "../../vendor/strategio/contentio-sdk/assets/typescript/Utils/FormValidator";
import SubscribeForm from "../../vendor/strategio/contentio-sdk/assets/typescript/Components/SubscribeForm";
import ContactForm from "../../vendor/strategio/contentio-sdk/assets/typescript/Components/ContactForm";
import CookieConsent from "../../vendor/strategio/contentio-sdk/assets/typescript/Plugins/CookieConsent";
import Bootstrap from "./Plugins/Bootstrap";

import Navigation from "./Components/Navigation";
import OverlayScrollbars from "overlayscrollbars";
import {tns} from 'tiny-slider';
import {SetupOptions} from "../../vendor/strategio/contentio-sdk/assets/typescript/Utils/FormValidator/types";

(() => {
    CookieConsent();

    // Init Bootstrap
    Bootstrap();

    // Init Scrollbar & Navigation
    //document.addEventListener("DOMContentLoaded", () => {
        const body = document.querySelector('body') as HTMLBodyElement;
        const instance = OverlayScrollbars(body, {});
        Navigation(instance);
    //});

    // Init slider
    if (document.getElementById('testimonials')) {
        tns({
            items: 1,
            container: '#testimonials',
            prevButton: '#testimonial-prev',
            nextButton: '#testimonial-next',
            navContainer: '#testimonial-nav-items',
        });
    }

    // Subscribe From validation rules
    const rules: SetupOptions = {
        errorClasses: 'is-invalid',
        neutralClasses: 'is-neutral',
        alertSuccessBg: 'bg-light text-success fw-bold mb-3 p-3 rounded-3 text-start',
        alertErrorBg: 'bg-light text-danger fw-bold mb-3 p-3 rounded-3 text-start',
        alertIcon: `
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-circle-fill me-2" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
            </svg>`,
        hiddenClass: 'd-none',
        antispamMessage: 'Vyčkejte 15 vteřin a odešlete zprávu znovu. Tímto se bráníme proti spamu, děkujeme za pochopení.',
        antispamDelay: 15 * 1000
    }

    SubscribeForm(FormValidator(rules), document.getElementById('subscribeForm') as HTMLFormElement | null, [
        {
            name: 'email',
            rules: [
                {type: 'required', message: 'E-mail je povinný.'},
                {type: 'max', message: 'Maximální délka e-mailu je 100 znaků.', param: {max: 50}},
                {type: 'email', message: 'E-mail musí být v platném formátu.'},
            ]
        }
    ]);

    ContactForm(FormValidator({
        ...rules,
        errorClasses: 'is-invalid',
        neutralClasses: 'is-neutral',
        alertSuccessBg: 'bg-success text-white fw-bold mb-3 p-3 rounded-3 text-start',
        alertErrorBg: 'bg-danger text-white fw-bold mb-3 p-3 rounded-3 text-start',
    }), document.getElementById('contactForm') as HTMLFormElement, [
        {
            name: 'contact',
            rules: [
                {type: 'max', message: 'Telefon / e-mail může obsahovat maximálně 100 znaků', param: {max: 100}},
                {type: 'min', message: 'Telefon / e-mail musí obsahovat alespoň 9 znaků.', param: {min: 9}},
                {type: 'required', message: 'Telefon / email je povinný.'},
            ],
        }
    ]);
})();