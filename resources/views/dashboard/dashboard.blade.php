<x-app-layout>
    <!-- ... -->
</x-app-layout>
<style>
    @keyframes fadeUptoDown {
        0% {
            opacity: 0;
            transform: translateY(-30px); /* Start from above */
        }
        100% {
            opacity: 1;
            transform: translateY(0); /* End at the normal position */
        }
    }

    .fadeInAnimation {
        opacity: 0;
        animation: fadeUptoDown 1s ease-out forwards;
    }

    @keyframes fadeToVisible {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .fadeInNoAnimation {
        opacity: 0;
        animation: fadeToVisible 1s ease forwards;
    }

    .popout:hover {
        transition: transform 0.3s ease; 
        transform: scale(1.05);
    }
</style>