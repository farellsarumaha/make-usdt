<div>
    <div class="flex mb-4">
        <p class="text-xs text-justify">Thanks for signing up! Before getting started, could you verify your email
            address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send
            you another.</p>
    </div>
    <div class="flex flex-col gap-1">
        <x-buttons.blue-button wire:click="sendVerification()" name="Send Verification Code"/>
        <x-buttons.default-button wire:click="logout()" name="Logout"/>
        <x-buttons.default-button wire:click="toHome()" name="Back to Home"/>
    </div>
</div>
