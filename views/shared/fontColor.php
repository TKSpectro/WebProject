<?php if (!isset($_GET['search']))
                    {if ($_GET['type'] == 'Jungs-Toys'){?>jungeColor<?}
                    elseif ($_GET['type'] == 'Konsolespiele' || isset($_GET['search']))
                    {?>konsoleColor<?}
                    else
                    {?>mädchenColor<?}
                }else
                   {?>mädchenColor<?}?>