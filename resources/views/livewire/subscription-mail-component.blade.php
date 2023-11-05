<p class="mb-65">Sign up for the daily newsletter</p>
<form class="form-subcriber d-flex" wire:submit.prevent="sendmail">
    <input type="email" name="email" placeholder="Your emaill address" wire:model="email"/>
    <button class="btn" type="submit">Subscribe</button>
</form>
