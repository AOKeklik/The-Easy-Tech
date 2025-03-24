"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'


const SectionText = () => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return <div 
        className='w-full lg:w-1/2 flex-col lg:pl-20'
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateX(0px)" : "translateX(60px)",
            opacity:isInView ? 1 : 0,
        }}
    >
        <div className='heading3'>Lorem ipsum dolor sit amet.</div>
        <div className='nav-infor mt-8'>
            <div className='title text-secondary mt-4'>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque atque alias aspernatur ullam expedita est cupiditate veniam, numquam sequi laudantium quas nam necessitatibus non voluptatem aliquam quod, autem exercitationem obcaecati!
            </div> 
        </div>
        <div className='button-block flex items-center gap-5 md:mt-10 mt-6 pb-2'>
            <a href="#" className='button-main text-white bg-blue-800 hover-button-black text-button rounded-full'> Get Started </a>
            <a href="#" className='button-main text-on-surface hover:bg-black hover:text-white hover:border-transparent bg-white text-button rounded-full border-2 border-blue-800 flex items-center gap-2'>+48 876 334 21</a>
        </div>
    </div> 
};

export default SectionText;