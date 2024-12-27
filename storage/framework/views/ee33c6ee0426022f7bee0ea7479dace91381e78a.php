<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('nn_site.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <main class="container main-part">

        <div class="converter-parent container">
            <div class="convert">
                <header class="flex space-between align-center">
                    <h2 class="heading-2"><?php echo e($lang->convertCurrency); ?></h2>
                    <div class="filter-n-calendar-container">
                        <div class="filter filter-by-date">
                            <button>
                                    <img src="<?php echo e(url('')); ?>/assets/images/calendar.svg" alt="calendar" />
                                    <span id="dateexchangerate-value" class="date-value"><?php echo e($lang->today); ?></span>
                                    <!-- <img src="<?php echo e(url('')); ?>/assets/images/down-arrow 4.svg" alt="" /> -->
                                </button>
                            <div class="date-input-wrap">
                                <input type="date"  name="" id="dateexchangerate" />
                            </div>
                        </div>
                        <div class="filter-icon-container" onclick="openpopup('.popup-currency-selectors')">
                            <img src="<?php echo e(url('')); ?>/assets/images/filter.svg" alt="Filter" height="16px" width="16px">
                        </div>
                    </div>
                </header>

                <div id="headerConverterLoader" style="display: flex;width: 100%;justify-content: center;">
                    <img src="<?php echo e(url('')); ?>/assets/images/Loading_icon.gif" width="200" height="100%" alt="Load">
                </div>  
                <div class="converter" id="headerConverter">
                       
                </div>
        
                <div class="flex space-between margin-top">
                    <p class="text-accent hide-on-md">
                        <?php echo e($lang->lastUpdated); ?>:&nbsp;
                        <?php if(getCurrentLocale() == 'ka'): ?>
                            <?php setlocale(LC_TIME, 'Georgian') ?>
                        <?php endif; ?>
                        <?php echo e(\Carbon\Carbon::parse(date('M d, Y'))->formatLocalized('%b %d, %Y')); ?>

                    </p>
        
                    <div class="convert__actions">
                        <a onclick="sharepopup('.share-popup')" id="shareA" href="javascript:void(0);">
                            <img src="<?php echo e(url('')); ?>/assets/images/share.svg" alt="share"> <?php echo e($lang->share); ?>

                        </a>
                        <a href="javascript:void(0);" onclick="window.print();">
                            <img src="<?php echo e(url('')); ?>/assets/images/printer.svg" alt="print"> <?php echo e($lang->print); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>

        <section class="section main-section-all-content">
            <!-- exchange rates -->
            <div class="tab-content">
                <!-- first div of official exchanges -->
                <div class="exchange exchange1 active" data-tab-content id="official-exchange-rate">
                    <header class="exchange__header table-header flex space-between">
                        <h2 class="heading-2"><?php echo e($lang->officialExchangeRate); ?></h2>
                        <input type="text" class="search-control" id="searchableRates" placeholder="<?php echo e($lang->search); ?>">
                    </header>
                    <div class="exchange-table">
                        <table>
                            <thead>
                                <tr>
                                    <th><?php echo e($lang->currency); ?></th>
                                    <th><?php echo e($lang->quantity); ?></th>
                                    <th><?php echo e($lang->exchangeRate); ?></th>
                                    <th><?php echo e($lang->difference); ?></th>
                                    <th><?php echo e($lang->lastSevenDays); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $currs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="currency-sticky searchablerate"  data-code="<?php echo e(strtolower($curr->code)); ?>">
                                        <td>
                                            <div class="flex gap" style="--gap: 0.5rem">
                                                <div>
                                                    <img src="<?php echo e(url('')); ?>/assets/images/flags/<?php echo e(strtolower($curr->code)); ?>.svg" width="21" height="21" alt="<?php echo e($curr->code); ?>" />
                                                </div>
                                                <?php echo e($curr->code); ?>

                                            </div>
                                        </td>
                                        <td><?php echo e($curr->quantity); ?> <?php echo e($curr->code); ?></td>
                                        <td><?php echo e($curr->rate); ?></td>
                                        <?php
                                            $currDiffClass = '';
                                            if ($curr->diff > 0) {
                                                $currDiffClass = ' currency-green';
                                            } elseif ($curr->diff < 0) {
                                                $currDiffClass = ' currency-red';
                                            }
                                        ?>
                                        <td class="flex gap small-height<?php echo e($currDiffClass); ?>">
                                            <?php if($curr->diff > 0): ?>
                                                <img src="<?php echo e(url('')); ?>/assets/images/green-arrow-up.svg" alt="Exchange Rate Increased">
                                                <?php echo e($curr->diff); ?>

                                            <?php elseif($curr->diff < 0): ?>
                                                <img src="<?php echo e(url('')); ?>/assets/images/red-arrow-down.svg" alt="Exchange Rate Decreased">
                                                <?php echo e($curr->diff * -1); ?>

                                            <?php elseif($curr->diff == 0): ?>
                                                0
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <img id="line-image-<?php echo e($curr->code); ?>" src="<?php echo e(url('')); ?>/assets/images/ezgif.com-gif-maker.gif" alt="Rate" />
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="show-more">
                        <img src="<?php echo e(url('')); ?>/assets/images/Down_Arrow_3.svg" alt="Exchange Rate Decreased" />
                    </button>
                    <p class="text-accent2" style="margin-top: 25px;">
                        <?php echo e($lang->lastUpdated); ?>:&nbsp;<?php echo e(\Carbon\Carbon::parse(date('M d, Y'))->formatLocalized('%b %d, %Y')); ?>

                    </p>
                </div>
            </div>
            <!-- second bank exchanges rate -->
            <div class="exchange active exchange-rate-parent" id="exchange-rate-in-banks">
                <header class="exchange__header flex space-betweenv bank-kiosk-header">
                    <h2 class="heading-2"><?php echo e($lang->exhangeRateInBanks); ?></h2>
                </header>
                <div class="banks-table">

                    <?php $banksChunkLoopIteration = 0 ?>

                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyBC => $banksChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="banks-row" id="row-<?php echo e($keyBC); ?>"<?php echo e($keyBC > 1 ? ' style=display:none' : ''); ?>>

                            <?php $banksChunkLoopIteration = $loop->iteration ?>
                        
                            <?php $__currentLoopData = $banksChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyB => $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="bank">
                                    <header class="scroll-toggle-btn<?php echo e($banksChunkLoopIteration < 2 ? ' active' : ''); ?>">
                                        <img class="bank-logo" src="<?php echo e(url('')); ?>/assets/images/banks/<?php echo e($bank['bid']); ?>.webp" alt="banks">
                                        <?php if(getCurrentLocale() == 'ka'): ?>
                                            <?php echo e($bank['bank_ka']); ?>

                                        <?php else: ?>
                                            <?php echo e($bank['bank_en']); ?>

                                        <?php endif; ?>
                                        <img class="bank-arrow-down1 bank-arrow-down" src="<?php echo e(url('')); ?>/assets/images/Down_Arrow_3.svg" alt="Scroll Down" style="display:<?php echo e($banksChunkLoopIteration >= 2 ? 'block' : 'none'); ?>;">
                                        <img class="bank-arrow-up1 bank-arrow-up" src="<?php echo e(url('')); ?>/assets/images/up_arrow_3.svg" alt="Scroll up" style="display:<?php echo e($banksChunkLoopIteration < 2 ? 'block' : 'none'); ?>;">
                                    </header>
                                    <table class="currenciestable"<?php echo e($banksChunkLoopIteration < 2 ? ' style=display:table' : ''); ?>>
                                        <thead>
                                            <tr>
                                                <th><?php echo e($lang->currency); ?></th>
                                                <th><?php echo e($lang->buy); ?></th>
                                                <th><?php echo e($lang->sell); ?></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $__currentLoopData = json_decode($bank['body']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <div class="flex gap" style="--gap: 0.5rem">
                                                            <div>
                                                                <img src="<?php echo e(url('')); ?>/assets/images/flags/<?php echo e(strtolower($key)); ?>.svg" width="21" height="21" alt="<?php echo e($curr->code); ?>" />
                                                            </div>
                                                            <?php echo e($key); ?>

                                                        </div>
                                                    </td>
                                                    <td><?php echo e(($key == 'RUB' && intval($b->buy) > 1)?$b->buy/100:$b->buy); ?></td>
                                                    <td><?php echo e(($key == 'RUB' && intval($b->sell) > 1)?$b->buy/100:$b->sell); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(count((array) json_decode($bank['body'])) < 4): ?>
                                                <?php for($i = 0; $i < (4 - count((array) json_decode($bank['body']))); $i++): ?>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($banksChunkLoopIteration > 2): ?>
                        <a class="view-more view-more-banks"><?php echo e($lang->viewMore); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Third Exchanges in Kiosk -->
            <div class="exchange active exchange-rate-parent" data-tab-content id="exchange-rate-in-banks">
                <header class="exchange__header flex space-between bank-kiosk-header">
                    <h2 class="heading-2"><?php echo e($lang->exchangeRateInBanksAndKiosks); ?></h2>
                </header>
                <div class="banks-table">

                    <?php $kiosksChunkLoopIteration = 0 ?>

                    <?php $__currentLoopData = $kiosks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyBC => $kiosksChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="banks-row" id="row-<?php echo e($keyBC); ?>"<?php echo e($keyBC > 1 ? ' style=display:none' : ''); ?>>

                            <?php $kiosksChunkLoopIteration = $loop->iteration ?>
                        
                            <?php $__currentLoopData = $kiosksChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyB => $kiosk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="bank">
                                    <header class="scroll-toggle-btn<?php echo e($kiosksChunkLoopIteration < 2 ? ' active' : ''); ?>">
                                        <img class="bank-logo" src="<?php echo e(url('')); ?>/assets/images/kiosks/<?php echo e($kiosk['bid']); ?>.webp" alt="kiosks">
                                        <?php if(getCurrentLocale() == 'ka'): ?>
                                            <?php echo e($kiosk['bank_ka']); ?>

                                        <?php else: ?>
                                            <?php echo e($kiosk['bank_en']); ?>

                                        <?php endif; ?>
                                        <img class="bank-arrow-down1 bank-arrow-down" src="<?php echo e(url('')); ?>/assets/images/Down_Arrow_3.svg" alt="Scroll Down" style="display:<?php echo e($kiosksChunkLoopIteration >= 2 ? 'block' : 'none'); ?>;">
                                        <img class="bank-arrow-up1 bank-arrow-up" src="<?php echo e(url('')); ?>/assets/images/up_arrow_3.svg" alt="Scroll up" style="display:<?php echo e($kiosksChunkLoopIteration < 2 ? 'block' : 'none'); ?>;">
                                    </header>
                                    <table class="currenciestable"<?php echo e($kiosksChunkLoopIteration < 2 ? ' style=display:table' : ''); ?>>
                                        <thead>
                                            <tr>
                                                <th><?php echo e($lang->currency); ?></th>
                                                <th><?php echo e($lang->buy); ?></th>
                                                <th><?php echo e($lang->sell); ?></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $__currentLoopData = json_decode($kiosk['body']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <div class="flex gap" style="--gap: 0.5rem">
                                                            <div>
                                                                <img src="<?php echo e(url('')); ?>/assets/images/flags/<?php echo e(strtolower($key)); ?>.svg" width="21" height="21" alt="<?php echo e($curr->code); ?>" />
                                                            </div>
                                                            <?php echo e($key); ?>

                                                        </div>
                                                    </td>
                                                    <td><?php echo e(($key == 'RUB' && intval($k->buy) > 1)?$k->buy/100:$k->buy); ?></td>
                                                    <td><?php echo e(($key == 'RUB' && intval($k->sell) > 1)?$k->buy/100:$k->sell); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(count((array) json_decode($kiosk['body'])) < 4): ?>
                                                <?php for($i = 0; $i < (4 - count((array) json_decode($kiosk['body']))); $i++): ?>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if($kiosksChunkLoopIteration > 2): ?>
                        <a class="view-more view-more-banks"><?php echo e($lang->viewMore); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <!-- here canvas -->
            <section class="dynamics">
                <header class="flex space-between align-center">
                    <h2 class="heading-2"><?php echo e($lang->exhangeDynamics); ?></h2>

                    <div class="flex gap">
                        <div class="filter filter-dropdown">
                            <button dropdown-trigger id="filter-dropdown-main-btn">
                                <div>
                                <img src="<?php echo e(url('')); ?>/assets/images/flags/us.svg" alt="USD" />
                                USD
                                </div>
                                <!-- <img src="<?php echo e(url('')); ?>/assets/images/down-arrow 4.svg" alt="" /> -->
                            </button>
                            
                            <div class="filter-options">
                                <?php $__currentLoopData = $currs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $curr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key == 5)break; ?>
                                    
                                        <button value="<?php echo e(strtolower($curr->code)); ?>" class="filter-options-btn">
                                            <img src="<?php echo e(url('')); ?>/assets/images/flags/<?php echo e(strtolower($curr->code)); ?>.svg" alt="<?php echo e($curr->code); ?>" />
                                            <?php echo e($curr->code); ?>

                                        </button>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="filter filter-by-date">
                            <button>
                                <img src="<?php echo e(url('')); ?>/assets/images/calendar.svg" alt="calendar" />
                                <span class="date-value"><?php echo e($lang->today); ?></span>
                                <!-- <img src="<?php echo e(url('')); ?>/assets/images/down-arrow 4.svg" alt="" /> -->
                            </button>
                            <div class="date-input-wrap">
                                <input type="date" name="" id="chartDate"  />
                            </div>
                        </div>
                    </div>
                </header>

                <div class="dynamics-chart-container-out">
                    <div class="dynamics-chart-container">
                        <div id="lineChartLoader">
                            <img src="<?php echo e(url('')); ?>/assets/images/Loading_icon.gif" width="300" height="100%" alt="Load">
                        </div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </section>
            <!-- Crypto currency -->
            <div class="tab-content crypto-block">
                <!-- first div of official exchanges -->
                <div class="exchange exchange2 active" data-tab-content id="crypto-exchange-rate">
                    <header class="exchange__header table-header flex space-between">
                        <h2 class="heading-2"><?php echo e($lang->cryptoExchangeRate); ?></h2>
                        <input type="text" id="searchableRates1" class="search-control" placeholder="<?php echo e($lang->search); ?>">
                    </header>
                    <div class="exchange-table crypto-table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="flex-th"><?php echo e($lang->currency); ?></th>
                                    <th class="flex-th">
                                        <p><?php echo e($lang->price); ?> 
                                            
                                        </p>
                                    </th>
                                    <th class="flex-th">
                                        <p><?php echo e($lang->twentyFourHourChange); ?>

                                            
                                        </p>
                                    </th>
                                    
                                        
                                            
                                        
                                    
                                    <th class="flex-th">
                                        <p>
                                            <?php echo e($lang->volumeTwentyFourHours); ?>                                         
                                            
                                        </p>
                                    </th>
                                    
                                    <th><?php echo e($lang->marketCap); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $cryptoCurrency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="searchablerate1" data-code="<?php echo e(strtolower($item->symbol)); ?>-<?php echo e(strtolower($item->name)); ?>">
                                        <td>
                                            <div class="flex gap" style="--gap: 0.5rem">
                                                <div class="crypto">
                                                    
                                                    <?php if(file_exists(public_path('assets/images/crypto_icons/'.strtolower($item->symbol).'.svg')) && $item->symbol != 'CON'): ?>
                                                        <img src="<?php echo e(url('')); ?>/assets/images/crypto_icons/<?php echo e(strtolower($item->symbol)); ?>.svg" width="20" height="20" alt="<?php echo e($item->name); ?>">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(url('')); ?>/assets/images/crypto_icons/no-image.png" width="20" height="20" alt="noimage">
                                                    <?php endif; ?>
                                                    <div class="cryptoname">
                                                        <p class="fullname-crypto"><?php echo e($item->name); ?></p>
                                                        <p class="abreviation-of-crypto"><?php echo e($item->symbol); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price">$ <?php echo e(isset($item->priceUsd) ? number_format(round($item->priceUsd, 4), 4) : '0'); ?></td>
                                        <td class="<?php echo e($item->changePercent24Hr > 0 ? 'cryptogreen' : 'cryptogreen-disabled cryptored'); ?>">
                                            <p>
                                                <?php if($item->changePercent24Hr > 0): ?>
                                                    <img src="<?php echo e(url('')); ?>/assets/images/green-arrow-up.svg" alt="rised"> <?php echo e(round($item->changePercent24Hr, 4)); ?>%
                                                <?php else: ?>
                                                    <img src="<?php echo e(url('')); ?>/assets/images/red-arrow-down.svg" alt="Exchange Rate Decreased"> <?php echo e(round($item->changePercent24Hr, 4) * - 1); ?>%
                                                <?php endif; ?>
                                            </p>
                                        </td>
                                        
                                        <td>
                                            <p class="daily-view">
                                                $
                                                <?php if(isset($item->volumeUsd24Hr)): ?>
                                                    <?php if($item->volumeUsd24Hr < 1000000): ?>
                                                        <?php echo e(number_format($item->volumeUsd24Hr)); ?>

                                                    <?php elseif($item->volumeUsd24Hr < 1000000000): ?>
                                                        <?php echo e(number_format($item->volumeUsd24Hr / 1000000, 2) . ' ' . $lang->m); ?>

                                                    <?php else: ?>
                                                        <?php echo e(number_format($item->volumeUsd24Hr / 1000000000, 2) . ' ' .  $lang->b); ?>

                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    0 
                                                <?php endif; ?>
                                                
                                            </p>
                                        </td>
                                        
                                        <td>
                                            <p class="daily-view">
                                                $ 
                                                <?php if(isset($item->marketCapUsd)): ?>
                                                    <?php if($item->marketCapUsd < 1000000): ?>
                                                    <?php elseif($item->marketCapUsd < 1000000000): ?>
                                                        <?php echo e(number_format($item->marketCapUsd / 1000000, 2) . ' ' . $lang->m); ?>

                                                    <?php else: ?>
                                                        <?php echo e(number_format($item->marketCapUsd / 1000000000, 2) . ' ' . $lang->b); ?>

                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    0 
                                                <?php endif; ?>
                                            </p>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="show-more">
                        <img src="<?php echo e(url('')); ?>/assets/images/Down_Arrow_3.svg" alt="down" />
                    </button>
                    <p class="text-accent2" style="margin-top: 25px;"><?php echo e($lang->lastUpdated); ?>:&nbsp;<?php echo e(\Carbon\Carbon::parse(date('M d, Y'))->formatLocalized('%b %d, %Y')); ?></p>
                </div>
            </div> 
        </section>
    </main>

    <?php $__env->startPush('popup'); ?>
        <div class="bg-overlay" onclick="bgoverlay_click()">
            <div class="popup-currency-selectors" style="display: none;">
                <div class="popup-header">
                    <h2><?php echo e($lang->chooseCurrency); ?></h2>
                    <img src="<?php echo e(url('')); ?>/assets/images/close.svg" alt="Close Popup" onclick="closepopup('.popup-currency-selectors')">
                </div>
                <div class="currencies-container" id="currencies-container_box">
                    <?php $__currentLoopData = $currs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                            <label for="checkboxInput<?php echo e($curr->code); ?>">
                                <div class="currency-item" id="checkboxHover<?php echo e($curr->code); ?>">
                                    <input <?php echo e((in_array($curr->code, $defaults)) ? 'checked':''); ?> id="checkboxInput<?php echo e($curr->code); ?>" class="checkbox" name="currencyCheckBox" type="checkbox" curr-code='<?php echo e($curr->code); ?>'  curr-rate='<?php echo e($curr->rate); ?>'  onChange="myFunction('#checkboxHover<?php echo e($curr->code); ?>', '#hoverH<?php echo e($curr->code); ?>', '#hoverp<?php echo e($curr->code); ?>', this)">
                                    <div class="currency-main-container">
                                        <div class="flagname">
                                            <img src="<?php echo e(url('')); ?>/assets/images/flags/<?php echo e(strtolower($curr->code)); ?>.svg" alt="<?php echo e($curr->code); ?>">
                                            <h4 id="hoverH<?php echo e($curr->code); ?>"><?php echo e($curr->code); ?></h4>
                                        </div>
                                        <p id="hoverp<?php echo e($curr->code); ?>">1 <?php echo e($curr->code); ?> = <?php echo e($curr->rate); ?> GEL</p>
                                    </div>
                                </div>
                            </label>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="popup-footer">
                    <button class="new-button-currency-popup" onclick="closepopup('.popup-currency-selectors')"><?php echo e($lang->save); ?></button>
                </div>
            </div>
            <!-- burger bar menu -->
            <?php echo $__env->make('nn_site.partials.burger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- share page pop up -->
            <div class="share-popup">
                <div class="share-popup-header">
                    <h3><?php echo e($lang->share); ?></h3>
                    <div class="closing-share-popup"onclick="closepopup('.share-popup')" ><img src="<?php echo e(url('')); ?>/assets/images/closing-X.svg" alt="Close"></div>
                </div>
                <div class="share-popup-elemenets-parent">
                    <div class="share-popup-elemenet">
                        <div class="share-popup-inner-element">
                            <a class="link-share-button" data-type="whatsapp" href="whatsapp://send?text=<?php echo e(url($_SERVER['REQUEST_URI'])); ?>" data-action="share/whatsapp/share">
                                <img src="<?php echo e(url('')); ?>/assets/images/whatsapp.svg" alt="WhatsApp">
                                <p>WhatsApp</p>
                            </a>
                        </div>
                    </div>
                    <div class="share-popup-elemenet">
                        <div class="share-popup-inner-element">
                            <a data-type="viber" class="link-share-button" href="viber://forward?text=<?php echo e(url($_SERVER['REQUEST_URI'])); ?>">
                                <img src="<?php echo e(url('')); ?>/assets/images/viber.svg" alt="Viber">
                                <p>Viber</p>
                            </a>
                        </div>
                    </div>
                    <div class="share-popup-elemenet">
                        <div class="share-popup-inner-element">
                            <a data-type="messanger" class="link-share-button" href="fb-messenger://share/?link=<?php echo e(url($_SERVER['REQUEST_URI'])); ?>">
                                <img src="<?php echo e(url('')); ?>/assets/images/messenger.svg" alt="Messenger">
                                <p>Messenger</p>
                            </a>
                        </div>
                    
                    </div>
                    <div class="share-popup-elemenet">
                        <div class="share-popup-inner-element">
                            <a href="#" class='copy-url-button'> 
                                <img src="<?php echo e(url('')); ?>/assets/images/copy-link.svg" alt="Copy Link">
                                <p><?php echo e($lang->copyLink); ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

 
<?php echo $__env->make('../nn_site/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_site/pages/home.blade.php ENDPATH**/ ?>