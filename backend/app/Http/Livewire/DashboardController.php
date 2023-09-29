<?php

namespace App\Http\Livewire;

use App\Http\ServiceTraits\DashboardService;
use Illuminate\View\View;
use Livewire\Component;

class DashboardController extends Component {
    use DashboardService;

    /**
     * Get offer products.
     *
     * @param [string] $timeStr
     * @return void
     */
    public function showSale(string $timeStr): void {
        $this->showSaleQuery($timeStr);
    }

    /**
     * Get order information.
     *
     * @param string $timeStr
     * @return void
     */
    public function showOrders(string $timeStr): void {
        $this->showOrdersQuery($timeStr);
    }

    /**
     * Get products revenue information.
     *
     * @param string $timeStr
     * @return void
     */
    public function showRevenue(string $timeStr): void {
        $this->showRevenueQuery($timeStr);
    }

    /**
     * Get users information.
     *
     * @param string $timeStr
     * @return void
     */
    public function showUsers(string $timeStr): void {
        $this->showUsersQuery($timeStr);
    }

    /**
     * Get new  arrival products.
     *
     * @param string $timeStr
     * @return void
     */
    public function showArrivals(string $timeStr): void {
        $this->newArrivalProductsQuery($timeStr);
    }

    /**
     * Get recent sale products.
     *
     * @param string $timeStr
     * @return void
     */
    public function showRecentSale(string $timeStr): void {
        $this->showRecentSaleQuery($timeStr);
    }

    /**
     * Get top revenue products.
     *
     * @param string $timeStr
     * @return void
     */
    public function showTopRevenueProducts(string $timeStr): void {
        $this->showTopRevenueProductsQuery($timeStr);
    }

    /**
     * Get all Dashboard information based on day or month or year when clicked day or month or year.
     *
     * @param string $timeStr
     * @return void
     */
    public function AllCalculationsAreBasedOnDayOrMonthOrYear(string $timeStr): void {
        $this->setStrTime($timeStr);

        $this->AllCalculationsAreBasedOnDayMonthOrYearOrQuery($timeStr);
    }

    public function mount(): void {
        $this->setStrTime('Today');

        $this->AllCalculationsAreBasedOnDayMonthOrYearOrQuery('Today');
    }

    public function render(): View {
        return view('livewire.dashboard');
    }
}
