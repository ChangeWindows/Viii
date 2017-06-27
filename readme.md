<p align="center">
<img src="http://changewindows.org/assets/logo/logo-light.png" width="100px" height="auto">

<h3 align="center">ChangeWindows</h3>

<p align="center">
Changing Windows one build at a time
<br />
<br />
<a href="https://changewindows.org">ChangeWindows.org</a>
&middot;
<a href="https://preview.changewindows.org">ChangeWindows.org Preview</a>
</p>
</p>

## About ChangeWindows

ChangeWindows has been around for as long as the Windows Insider Program has been around and ever since that faitful day on 1 October 2014, our goal has been the same: do what Microsoft doesn't do: document every change we can possibly find in Windows on any platform.

## Open source

This repository is a big shift for ChangeWindows from the previous 4 major versions. Not only is this the first time we're publishing the actual source of our website, we're also using for the first time a framework, in this case Laravel, to build our website. Not only because we're lazy, but also because it makes things a lot simpeler and cleaner.

ChangeWindows 5.0 is still in development when you're reading this. Chances are that you'll find this to be more of a Laravel-repository than anything else. Before we put this major revamp of our website online, we want to have reached feature parity with what we currently have, and that will take a while. We have to catch up with over 2,5 year of development.

## Development goals

As said above, we first want to reach some goals before this version of ChangeWindows goes public on ChangeWindows.org. Behold:

### Pre-alpha stage

This is a non-live stage in the sense that there won't be an official place for you to check the code out running. Obviously, you'll be able to try it out yourself from this repository.

During this fase, we want to have a basic version of ChangeWindows set up, this basically means this:

- Information parity with ChangeWindows 4.x (builds, releases, milestones, rings, etc.)
- Basic Cortana support for the ChangeWindows Preview

The support for Cortana may not seem "basic" at all, but since one of the requirements for Hosted Web Apps in the Windows Store is that they utilize the Windows API at least on some level, we've decided to go with Cortana integration.

### Alpha stage

When the pre-alpha stage is reached, we'll push Alpha 1 to preview.changewindows.org (and thus ChangeWindows Preview). From this point on, our website will be live. At this point, we'll start expanding our website to better feature parity.

Alpha 2 should establish most of the system we have right now:

- Expand index with rings overview and filters
- Version share
- Year in review
- Basic blog

Alpha 3 on the other hand will focus on the customization options we provide right now:

- Personal filter defaults
- Dark/light theme
- Accent color
- Platform control

### Beta stage

As soon as all that is done, we will inter beta-stage, at which point we consider the initial release of ChangeWindows 5 feature complete. From here on, it is bug fixing and probably some repository cleanup to prepare for the full launch.

## Contributing

We are open to contributions to ChangeWindows. Do you have a feature that you really want to see but we are not spending any time on it ourselves? Feel free to open a pull request for it!

## Security Vulnerabilities

If you discover a security vulnerability within ChangeWindows, please send an e-mail to us at contact@changewindows.org. All security vulnerabilities will be promptly addressed.

## License

The ChangeWindows website is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT). Note however that the content on our website isn't.