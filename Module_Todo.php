<?php
namespace GDO\Todo;

use GDO\Core\GDO_Module;
use GDO\DB\GDT_Checkbox;
use GDO\UI\GDT_Page;
use GDO\UI\GDT_Link;

/**
 * A todo database.
 * @author gizmore
 */
final class Module_Todo extends GDO_Module
{
    public $module_priority = 80;

    ##############
    ### Module ###
    ##############
    public function onLoadLanguage()
    {
        return $this->loadLanguage('lang/todo');
    }
    
    public function getClasses()
    {
        return [
            GDO_Todo::class,
        ];
    }
    
    ##############
    ### Config ###
    ##############
    public function getConfig()
    {
        return [
            GDT_Checkbox::make('todo_left_bar')->initial('1'),
            GDT_Checkbox::make('todo_add_guests')->initial('1'),
        ];
    }
    public function cfgSidebar() { return $this->getConfigVar('todo_left_bar'); }
    public function cfgAddGuests() { return $this->getConfigVar('todo_add_guests'); }
    
    ############
    ### Init ###
    ############
    public function onIncludeScripts()
    {
    }
    
    public function onInitSidebar()
    {
        if ($this->cfgSidebar())
        {
            GDT_Page::$INSTANCE->leftNav->addFields([
                GDT_Link::make('link_todo_add')->href(href('Todo', 'Add')),
                GDT_Link::make('mtitle_todo_search')->href(href('Todo', 'Search')),
            ]);
        }
    }
    
}
