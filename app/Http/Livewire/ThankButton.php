<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D Community Edition is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D Community Edition
 *
 * @author     HDVinnie <hdinnovations@protonmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 */

namespace App\Http\Livewire;

use App\Models\Thank;
use Livewire\Component;

class ThankButton extends Component
{
    public $torrent;
    public $user;

    public function mount($torrent)
    {
        $this->user = \auth()->user();
        $this->torrent = $torrent;
    }

    public function thank()
    {
        if ($this->user->id === $this->torrent->user_id) {
            $this->dispatchBrowserEvent('error', ['type' => 'error',  'message' => 'You Cannot Thank Your Own Content!']);

            return;
        }

        $thank = Thank::where('user_id', '=', $this->user->id)->where('torrent_id', '=', $this->torrent->id)->first();
        if ($thank) {
            $this->dispatchBrowserEvent('error', ['type' => 'error',  'message' => 'You Have Already Thanked!']);

            return;
        }

        $thank = new Thank();
        $thank->user_id = $this->user->id;
        $thank->torrent_id = $this->torrent->id;
        $thank->save();

        //Notification
        if ($this->user->id !== $this->torrent->user_id) {
            $this->torrent->notifyUploader('thank', $thank);
        }

        $this->dispatchBrowserEvent('success', ['type' => 'success',  'message' => 'Your Thank Was Successfully Applied!']);
    }

    public function render()
    {
        return \view('livewire.thank-button');
    }
}
