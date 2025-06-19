"use client"

import { useState, useEffect } from "react"
import { ChevronDown, Plane, Shield, Zap, Bell, Users, CheckCircle, Menu, X } from "lucide-react"
import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { Badge } from "@/components/ui/badge"

export default function PolicyPilotsLanding() {
  const [isMenuOpen, setIsMenuOpen] = useState(false)
  const [activeAccordion, setActiveAccordion] = useState<number | null>(null)

  useEffect(() => {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("animate-fade-in-up")
          }
        })
      },
      { threshold: 0.1 },
    )

    const elements = document.querySelectorAll(".fade-in-on-scroll")
    elements.forEach((el) => observer.observe(el))

    return () => observer.disconnect()
  }, [])

  const toggleAccordion = (index: number) => {
    setActiveAccordion(activeAccordion === index ? null : index)
  }

  return (
    <div className="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
      {/* Navigation */}
      <nav className="fixed top-0 w-full bg-white/80 backdrop-blur-md border-b border-gray-100 z-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-center h-16">
            <div className="flex items-center space-x-3">
              <div className="w-10 h-10 bg-gradient-to-br from-sky-400 to-teal-500 rounded-xl flex items-center justify-center">
                <Plane className="w-6 h-6 text-white transform rotate-45" />
              </div>
              <span className="text-xl font-bold text-gray-900">Policy Pilots</span>
            </div>

            <div className="hidden md:flex items-center space-x-8">
              <a href="#features" className="text-gray-600 hover:text-sky-600 transition-colors">
                Features
              </a>
              <a href="#how-it-works" className="text-gray-600 hover:text-sky-600 transition-colors">
                How It Works
              </a>
              <a href="#faq" className="text-gray-600 hover:text-sky-600 transition-colors">
                FAQ
              </a>
              <Button className="bg-sky-500 hover:bg-sky-600 text-white">Get Started</Button>
            </div>

            <button className="md:hidden p-2" onClick={() => setIsMenuOpen(!isMenuOpen)}>
              {isMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
            </button>
          </div>
        </div>

        {/* Mobile Menu */}
        {isMenuOpen && (
          <div className="md:hidden bg-white border-t border-gray-100">
            <div className="px-4 py-4 space-y-4">
              <a href="#features" className="block text-gray-600 hover:text-sky-600">
                Features
              </a>
              <a href="#how-it-works" className="block text-gray-600 hover:text-sky-600">
                How It Works
              </a>
              <a href="#faq" className="block text-gray-600 hover:text-sky-600">
                FAQ
              </a>
              <Button className="w-full bg-sky-500 hover:bg-sky-600 text-white">Get Started</Button>
            </div>
          </div>
        )}
      </nav>

      {/* Hero Section */}
      <section className="pt-32 pb-20 px-4 sm:px-6 lg:px-8">
        <div className="max-w-7xl mx-auto text-center">
          <div className="fade-in-on-scroll">
            <Badge className="mb-6 bg-sky-100 text-sky-700 hover:bg-sky-100">AI-Powered Insurance Intelligence</Badge>
            <h1 className="text-5xl md:text-7xl font-bold text-gray-900 mb-6 leading-tight">
              Your AI Co-Pilot for{" "}
              <span className="bg-gradient-to-r from-sky-500 to-teal-500 bg-clip-text text-transparent">
                Smarter Insurance
              </span>
            </h1>
            <p className="text-xl md:text-2xl text-gray-600 mb-10 max-w-3xl mx-auto leading-relaxed">
              Compare quotes, switch smart, and save — all on autopilot.
            </p>
            <div className="flex flex-col sm:flex-row gap-4 justify-center items-center">
              <Button size="lg" className="bg-sky-500 hover:bg-sky-600 text-white px-8 py-4 text-lg">
                Find My Best Quote
              </Button>
              <Button size="lg" variant="outline" className="border-gray-300 text-gray-700 px-8 py-4 text-lg">
                Watch Demo
              </Button>
            </div>
          </div>
        </div>
      </section>

      {/* How It Works */}
      <section id="how-it-works" className="py-20 px-4 sm:px-6 lg:px-8 bg-white">
        <div className="max-w-7xl mx-auto">
          <div className="text-center mb-16 fade-in-on-scroll">
            <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6">How It Works</h2>
            <p className="text-xl text-gray-600 max-w-2xl mx-auto">Three simple steps to smarter insurance decisions</p>
          </div>

          <div className="grid md:grid-cols-3 gap-8">
            {[
              {
                step: "01",
                title: "Tell us what you need",
                description: "Share your insurance requirements and current coverage details in just a few clicks.",
                icon: <Users className="w-8 h-8" />,
              },
              {
                step: "02",
                title: "Let AI compare policies",
                description: "Our AI analyzes thousands of policies across top insurers to find your perfect match.",
                icon: <Zap className="w-8 h-8" />,
              },
              {
                step: "03",
                title: "Get alerts to switch & save",
                description: "Receive notifications when better deals become available and switch seamlessly.",
                icon: <Bell className="w-8 h-8" />,
              },
            ].map((item, index) => (
              <Card
                key={index}
                className="fade-in-on-scroll border-0 shadow-lg hover:shadow-xl transition-all duration-300 group"
              >
                <CardContent className="p-8 text-center">
                  <div className="w-16 h-16 bg-gradient-to-br from-sky-400 to-teal-500 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <div className="text-white">{item.icon}</div>
                  </div>
                  <div className="text-sm font-bold text-sky-500 mb-2">STEP {item.step}</div>
                  <h3 className="text-xl font-bold text-gray-900 mb-4">{item.title}</h3>
                  <p className="text-gray-600 leading-relaxed">{item.description}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Features */}
      <section id="features" className="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-50 to-blue-50">
        <div className="max-w-7xl mx-auto">
          <div className="text-center mb-16 fade-in-on-scroll">
            <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Why Choose Policy Pilots</h2>
            <p className="text-xl text-gray-600 max-w-2xl mx-auto">
              Advanced AI technology meets human-friendly insurance management
            </p>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            {[
              {
                title: "Real-time Quote Tracking",
                description: "Monitor price changes across all major insurers in real-time",
                icon: <Zap className="w-6 h-6" />,
              },
              {
                title: "Instant Comparison",
                description: "Compare policies side-by-side with AI-powered insights",
                icon: <Shield className="w-6 h-6" />,
              },
              {
                title: "Cancel & Switch Support",
                description: "We handle the paperwork when you switch providers",
                icon: <CheckCircle className="w-6 h-6" />,
              },
              {
                title: "Multi-Policy Coverage",
                description: "Works with home, auto, and life insurance policies",
                icon: <Users className="w-6 h-6" />,
              },
            ].map((feature, index) => (
              <Card
                key={index}
                className="fade-in-on-scroll border-0 shadow-md hover:shadow-lg transition-all duration-300 group"
              >
                <CardContent className="p-6">
                  <div className="w-12 h-12 bg-gradient-to-br from-sky-400 to-teal-500 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <div className="text-white">{feature.icon}</div>
                  </div>
                  <h3 className="text-lg font-bold text-gray-900 mb-2">{feature.title}</h3>
                  <p className="text-gray-600 text-sm leading-relaxed">{feature.description}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Social Proof */}
      <section className="py-20 px-4 sm:px-6 lg:px-8 bg-white">
        <div className="max-w-7xl mx-auto text-center fade-in-on-scroll">
          <h3 className="text-2xl font-bold text-gray-900 mb-8">Trusted by thousands of smart savers</h3>
          <div className="flex flex-wrap justify-center items-center gap-8 opacity-60">
            {["Allstate", "State Farm", "GEICO", "Progressive", "Liberty Mutual"].map((company, index) => (
              <div key={index} className="text-2xl font-bold text-gray-400">
                {company}
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* FAQ */}
      <section id="faq" className="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-50 to-blue-50">
        <div className="max-w-4xl mx-auto">
          <div className="text-center mb-16 fade-in-on-scroll">
            <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
            <p className="text-xl text-gray-600">Everything you need to know about Policy Pilots</p>
          </div>

          <div className="space-y-4 fade-in-on-scroll">
            {[
              {
                question: "How does Policy Pilots compare quotes?",
                answer:
                  "Our AI technology connects with major insurance providers to gather real-time quotes based on your specific needs and profile. We analyze coverage options, deductibles, and pricing to find the best match for you.",
              },
              {
                question: "Is it really free to use?",
                answer:
                  "Yes! Policy Pilots is completely free for consumers. We earn a small commission from insurance providers when you choose to switch, but this never affects the quotes or recommendations you receive.",
              },
              {
                question: "Will I need to cancel my current policy?",
                answer:
                  "Not necessarily! We help you understand when it makes sense to switch and can assist with the cancellation process if you decide to move to a better policy. We handle all the paperwork for you.",
              },
              {
                question: "How often do you check for better deals?",
                answer:
                  "Our AI monitors the market continuously, checking for better deals daily. You'll receive notifications only when we find significantly better options that could save you money.",
              },
            ].map((faq, index) => (
              <Card key={index} className="border-0 shadow-md">
                <CardContent className="p-0">
                  <button
                    className="w-full p-6 text-left flex justify-between items-center hover:bg-gray-50 transition-colors"
                    onClick={() => toggleAccordion(index)}
                  >
                    <span className="text-lg font-semibold text-gray-900">{faq.question}</span>
                    <ChevronDown
                      className={`w-5 h-5 text-gray-500 transition-transform ${
                        activeAccordion === index ? "rotate-180" : ""
                      }`}
                    />
                  </button>
                  {activeAccordion === index && (
                    <div className="px-6 pb-6">
                      <p className="text-gray-600 leading-relaxed">{faq.answer}</p>
                    </div>
                  )}
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Final CTA */}
      <section className="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-sky-500 to-teal-500">
        <div className="max-w-4xl mx-auto text-center fade-in-on-scroll">
          <h2 className="text-4xl md:text-5xl font-bold text-white mb-6">Start Saving Today</h2>
          <p className="text-xl text-sky-100 mb-10 max-w-2xl mx-auto">
            Join thousands of smart savers who trust Policy Pilots to find their best insurance deals.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button size="lg" className="bg-white text-sky-600 hover:bg-gray-100 px-8 py-4 text-lg">
              Get My Free Quote
            </Button>
            <Button
              size="lg"
              variant="outline"
              className="border-white text-white hover:bg-white hover:text-sky-600 px-8 py-4 text-lg"
            >
              Learn More
            </Button>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-gray-900 text-white py-16 px-4 sm:px-6 lg:px-8">
        <div className="max-w-7xl mx-auto">
          <div className="grid md:grid-cols-4 gap-8 mb-8">
            <div>
              <div className="flex items-center space-x-3 mb-4">
                <div className="w-10 h-10 bg-gradient-to-br from-sky-400 to-teal-500 rounded-xl flex items-center justify-center">
                  <Plane className="w-6 h-6 text-white transform rotate-45" />
                </div>
                <span className="text-xl font-bold">Policy Pilots</span>
              </div>
              <p className="text-gray-400 leading-relaxed">Your AI co-pilot for smarter insurance decisions.</p>
            </div>

            <div>
              <h4 className="font-semibold mb-4">Product</h4>
              <ul className="space-y-2 text-gray-400">
                <li>
                  <a href="#" className="hover:text-white transition-colors">
                    Features
                  </a>
                </li>
                <li>
                  <a href="#" className="hover:text-white transition-colors">
                    How It Works
                  </a>
                </li>
                <li>
                  <a href="#" className="hover:text-white transition-colors">
                    Pricing
                  </a>
                </li>
                <li>
                  <a href="#" className="hover:text-white transition-colors">
                    API
                  </a>
                </li>
              </ul>
            </div>

            <div>
              <h4 className="font-semibold mb-4">Company</h4>
              <ul className="space-y-2 text-gray-400">
                <li>
                  <a href="#" className="hover:text-white transition-colors">
                    About
                  </a>
                </li>
                <li>
                  <a href="#" className="hover:text-white transition-colors">
                    Blog
                  </a>
                </li>
                <li>
                  <a href="#" className="hover:text-white transition-colors">
                    Careers
                  </a>
                </li>
                <li>
                  <a href="#" className="hover:text-white transition-colors">
                    Contact
                  </a>
                </li>
              </ul>
            </div>

            <div>
              <h4 className="font-semibold mb-4">Legal</h4>
              <ul className="space-y-2 text-gray-400">
                <li>
                  <a href="#" className="hover:text-white transition-colors">
                    Privacy Policy
                  </a>
                </li>
                <li>
                  <a href="#" className="hover:text-white transition-colors">
                    Terms of Service
                  </a>
                </li>
                <li>
                  <a href="#" className="hover:text-white transition-colors">
                    Cookie Policy
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div className="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p className="text-gray-400 text-sm">© 2024 Policy Pilots. All rights reserved.</p>
            <div className="flex space-x-6 mt-4 md:mt-0">
              <a href="#" className="text-gray-400 hover:text-white transition-colors">
                Twitter
              </a>
              <a href="#" className="text-gray-400 hover:text-white transition-colors">
                LinkedIn
              </a>
              <a href="#" className="text-gray-400 hover:text-white transition-colors">
                GitHub
              </a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  )
}
