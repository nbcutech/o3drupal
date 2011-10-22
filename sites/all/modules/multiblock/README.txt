PROBLEM:
Drupal's block module is limited by the fact that a block can
only have one instance. Each block has a 1:1 relationship with
its region, weight, visibility (and other) settings. This means 
that it is impossible to have blocks in multiple regions or to
have blocks that have different settings on different pages.

SOLUTION:
multiblock module will keep track of multiple instances of blocks
and dispatch to their appropriate block hooks. Using this stratgey,
you would not enable any blocks that are implemented by other
modules. Instead, you will go to admin/build/block/instances and create
an "instance" of a block. Multiblock module will then implement this
block in its own block hook which will forward any hook_block calls
to the original module's hook. Using this method we can maintain
multiple instances of blocks with different settings but the same
implementation. This should not affect block-level caching. One
catch here is that the configure and save $op's for hook_block
are usually implemented to save only one set of data. This means
that for blocks that are unaware of multiblock you will only be
able to save CUSTOM data (this doesnt include visibility, weight,
region, etc.) for one set of data.

HOW TO USE IT:
1. Go to admin/build/block/instances
2. Select the type of block you want to create an instance of and
   type a unique title for that instance
3. Click "Add Instance"
4. Go to admin/build/block
5. Enable the block instance you have just created.

DEVELOPING MULTIBLOCK-ENABLED BLOCKS:
Multiblock should successfully clone any regular block created with
hook_block. However, if you clone a regular block that implements a
save or configure $op of hook_block, the custom block settings of
one block instance will overwrite the settings of another. To get
around this, you can make a block "multiblock enabled". To do this,
you have to first add an $op to your hook_block called 'mb_enabled'.
It should always return the string 'mb_enabled'. Once you do this,
the instances you create will get the block instance ID passed
in the $edit variable for the view, configure, and save $ops. This
will let you save and load different data to different instances
based on this instance ID. It is passed in with the
'multiblock_delta' key with the following format:
$edit['multiblock_delta'] = array(
          '#type' => 'value',
          '#value' => $block_id
      );
