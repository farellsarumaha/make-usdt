<div>
    <div class="flex mb-4">
        <p class="text-xs text-justify">Thanks for signing up! Before getting started, could you verify your email
            address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send
            you another.</p>
    </div>
    <div class="flex flex-col gap-1">
        <x-button wire:click="sendVerification()" value="Send Verification Code" color="blue" class="w-full text-sm" />
        <x-button wire:click="logout()" value="Logout" class="w-full text-sm" />
        <x-button wire:click="toHome()" value="Back to Home" class="w-full text-sm" />
    </div>
</div>
