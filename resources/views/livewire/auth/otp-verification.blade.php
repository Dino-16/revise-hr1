<div>
    @if (session('status'))
        <p class="text-green-600">{{ session('status') }}</p>
    @endif

    <form wire:submit.prevent="verifyOtp">
        <p>We sent an OTP to your email. Enter it below:</p>
        <input type="text" wire:model="otp" placeholder="Enter OTP">
        @error('otp') <span class="text-red-600">{{ $message }}</span> @enderror
        <button type="submit">Verify OTP</button>
    </form>

    <div class="mt-4">
        <button wire:click="resendOtp" class="btn btn-secondary">
            Resend OTP
        </button>
    </div>
</div>